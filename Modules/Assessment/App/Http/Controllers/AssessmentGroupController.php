<?php

namespace Modules\Assessment\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $assessmentGroups = $this->assessmentGroupService->findAll();
        $groupPercentages = [];
        foreach ($assessmentGroups as $group) {
            $groupPercentages[$group->id] = $this->assessmentGroupService->getGroupPercentages($megaBuilding, $buildingType, $group);
        }

        // Calculate gauge data
        $megaBuildingPercentage = $this->itemService->getMegaBuildingPercentage($megaBuilding);
        $buildingTypeAveragePercentage = $this->assessmentGroupService->getBuildingTypeAveragePercentage($megaBuilding, $buildingType);

        // Calculate EP and AP for Mega Building
        $megaBuildingEP = 0;
        $megaBuildingAP = 0;
        $megaBuildingRecords = \Modules\Assessment\App\Models\ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
            ->with('item')
            ->get()
            ->filter(function ($record) {
                return $record->item && $record->item->type === 'Optional';
            });
        $megaBuildingEP = $megaBuildingRecords->sum('earned_points');
        $megaBuildingAP = $megaBuildingRecords->sum(function ($record) {
            return $record->item->available_points;
        });

        // Calculate EP and AP for Building Type
        $buildingTypeEP = 0;
        $buildingTypeAP = 0;
        $buildingTypeRecords = \Modules\Assessment\App\Models\ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
            ->where('building_type_id', $buildingType->id)
            ->with('item')
            ->get()
            ->filter(function ($record) {
                return $record->item && $record->item->type === 'Optional';
            });
        $buildingTypeEP = $buildingTypeRecords->sum('earned_points');
        $buildingTypeAP = $buildingTypeRecords->sum(function ($record) {
            return $record->item->available_points;
        });

        // Calculate classification percentages aggregated across all assessment groups for this building type
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

        // Calculate percentages for each classification
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
            'megaBuildingPercentage' => $megaBuildingPercentage,
            'megaBuildingEP' => round($megaBuildingEP, 2),
            'megaBuildingAP' => round($megaBuildingAP, 2),
            'buildingTypeAveragePercentage' => $buildingTypeAveragePercentage,
            'buildingTypeEP' => round($buildingTypeEP, 2),
            'buildingTypeAP' => round($buildingTypeAP, 2),
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
