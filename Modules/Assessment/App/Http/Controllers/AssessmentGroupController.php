<?php

namespace Modules\Assessment\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Assessment\App\Models\Item;
use Modules\Assessment\Services\AssessmentGroupService;
use Modules\Assessment\Services\ItemService;
use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;

class AssessmentGroupController extends Controller
{
    public function __construct(
        private AssessmentGroupService $assessmentGroupService,
        private ItemService $itemService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(MegaBuilding $megaBuilding, BuildingType $buildingType)
    {
        $assessmentGroups = $this->assessmentGroupService->findAll($buildingType);
        $groupPercentages = [];
        foreach ($assessmentGroups as $group) {
            $groupPercentages[$group->id] = $this->assessmentGroupService->getGroupPercentages($megaBuilding, $buildingType, $group);
        }

        // Calculate gauge data
        $megaBuildingPercentage = $this->itemService->getMegaBuildingPercentage($megaBuilding);
        $buildingTypeAveragePercentage = $this->assessmentGroupService->getBuildingTypeAveragePercentage($megaBuilding, $buildingType);

        // Calculate EP for Mega Building (from earned records) — AP from the full Item pool
        $megaBuildingEarnedRecords = \Modules\Assessment\App\Models\ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
            ->with('item')
            ->get()
            ->filter(fn($r) => $r->item && $r->item->type === 'Optional');

        $megaBuildingEP = $megaBuildingEarnedRecords->sum('earned_points');
        // AP = ALL optional items across all building types (true total pool)
        $megaBuildingAP = Item::where('type', 'Optional')->sum('available_points');

        // Calculate EP for Building Type (from earned records) — AP from the Item pool for this building type
        $buildingTypeEarnedRecords = \Modules\Assessment\App\Models\ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
            ->where('building_type_id', $buildingType->id)
            ->with('item')
            ->get()
            ->filter(fn($r) => $r->item && $r->item->type === 'Optional');

        $buildingTypeEP = $buildingTypeEarnedRecords->sum('earned_points');
        // AP = ALL optional items belonging to this building type (true pool for this type)
        $buildingTypeAP = Item::where('type', 'Optional')
            ->where('building_type_id', $buildingType->id)
            ->sum('available_points');

        // ============ MEGA BUILDING CLASSIFICATION DATA (across ALL building types) ============
        $megaClassificationData = $this->assessmentGroupService->getMegaBuildingClassificationData($megaBuilding);

        // ============ BUILDING TYPE CLASSIFICATION DATA (for current building type only) ============
        $classificationData = [
            'Sustainable' => ['earned' => 0, 'available' => 0],
            'Healthy' => ['earned' => 0, 'available' => 0],
            'Intelligent' => ['earned' => 0, 'available' => 0],
        ];

        foreach ($assessmentGroups as $group) {
            $groupData = $this->assessmentGroupService->getGroupPercentagesWithData($megaBuilding, $buildingType, $group);
            foreach ($groupData as $classification => $data) {
                $classificationData[$classification]['earned'] += $data['earned'];
                $classificationData[$classification]['available'] += $data['available'];
            }
        }

        // Calculate percentages for each classification (Building Type specific)
        $sustainablePercentage = 0;
        $intelligentPercentage = 0;
        $healthyPercentage = 0;

        if ($classificationData['Sustainable']['available'] > 0) {
            $sustainablePercentage = round(($classificationData['Sustainable']['earned'] / $classificationData['Sustainable']['available']) * 100, 2);
        }
        if ($classificationData['Intelligent']['available'] > 0) {
            $intelligentPercentage = round(($classificationData['Intelligent']['earned'] / $classificationData['Intelligent']['available']) * 100, 2);
        }
        if ($classificationData['Healthy']['available'] > 0) {
            $healthyPercentage = round(($classificationData['Healthy']['earned'] / $classificationData['Healthy']['available']) * 100, 2);
        }

        return view('assessment::assessment-groups.index', [
            'assessmentGroups' => $assessmentGroups,
            'megaBuilding' => $megaBuilding,
            'buildingType' => $buildingType,
            'groupPercentages' => $groupPercentages,
            // Mega Building overall data
            'megaBuildingPercentage' => $megaBuildingPercentage,
            'megaBuildingEP' => round($megaBuildingEP, 2),
            'megaBuildingAP' => round($megaBuildingAP, 2),
            // Mega Building classification data (across ALL building types)
            'megaSustainablePercentage' => $megaClassificationData['Sustainable']['percentage'],
            'megaSustainableEP' => $megaClassificationData['Sustainable']['earned'],
            'megaSustainableAP' => $megaClassificationData['Sustainable']['available'],
            'megaHealthyPercentage' => $megaClassificationData['Healthy']['percentage'],
            'megaHealthyEP' => $megaClassificationData['Healthy']['earned'],
            'megaHealthyAP' => $megaClassificationData['Healthy']['available'],
            'megaIntelligentPercentage' => $megaClassificationData['Intelligent']['percentage'],
            'megaIntelligentEP' => $megaClassificationData['Intelligent']['earned'],
            'megaIntelligentAP' => $megaClassificationData['Intelligent']['available'],
            // Building Type specific data
            'buildingTypeAveragePercentage' => $buildingTypeAveragePercentage,
            'buildingTypeEP' => round($buildingTypeEP, 2),
            'buildingTypeAP' => round($buildingTypeAP, 2),
            // Building Type classification data (current building type only)
            'sustainablePercentage' => $sustainablePercentage,
            'sustainableEP' => round($classificationData['Sustainable']['earned'], 2),
            'sustainableAP' => round($classificationData['Sustainable']['available'], 2),
            'intelligentPercentage' => $intelligentPercentage,
            'intelligentEP' => round($classificationData['Intelligent']['earned'], 2),
            'intelligentAP' => round($classificationData['Intelligent']['available'], 2),
            'healthyPercentage' => $healthyPercentage,
            'healthyEP' => round($classificationData['Healthy']['earned'], 2),
            'healthyAP' => round($classificationData['Healthy']['available'], 2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assessment::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('assessment::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('assessment::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
