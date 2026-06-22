<?php

namespace Modules\Build\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Assessment\App\Models\Item;
use Modules\Build\App\Models\MegaBuilding;
use Modules\Build\Services\BuildingTypeService;

class BuildingTypeController extends Controller
{
    public function __construct(private BuildingTypeService $buildingTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(MegaBuilding $mega_building)
    {
        $buildingTypes = $this->buildingTypeService->findAll();

        $buildingTypePercentages = [];
        foreach ($buildingTypes as $buildingType) {
            $buildingTypePercentages[$buildingType->id] = $this->buildingTypeService->getBuildingTypePercentages(
                $mega_building,
                $buildingType
            );
        }

        // Calculate mega building EP (from earned records) and AP (from ALL optional items — the true total pool)
        $megaBuildingEarnedRecords = \Modules\Assessment\App\Models\ItemEarnedPoint::where('mega_building_id', $mega_building->id)
            ->with('item')
            ->get()
            ->filter(fn($record) => $record->item && $record->item->type === 'Optional');

        $megaBuildingEP = $megaBuildingEarnedRecords->sum('earned_points');

        // AP = total available points across ALL Optional items (not limited to evaluated ones)
        $megaBuildingAP = Item::where('type', 'Optional')->sum('available_points');

        // Classification EP from earned records; AP from ALL Optional items of that classification
        $classificationData = [
            'Sustainable' => ['earned' => 0, 'available' => 0],
            'Healthy'     => ['earned' => 0, 'available' => 0],
            'Intelligent' => ['earned' => 0, 'available' => 0],
        ];

        // Sum earned per classification from ItemEarnedPoint records
        foreach ($megaBuildingEarnedRecords as $record) {
            $cls = $record->item->classification;
            if (isset($classificationData[$cls])) {
                $classificationData[$cls]['earned'] += $record->earned_points;
            }
        }

        // Sum available per classification from ALL Optional items (correct denominator)
        foreach (array_keys($classificationData) as $cls) {
            $classificationData[$cls]['available'] = Item::where('type', 'Optional')
                ->where('classification', $cls)
                ->sum('available_points');
        }

        $buildingTypeEP = $megaBuildingEP;
        $buildingTypeAP = $megaBuildingAP;
        $buildingTypeAveragePercentage = $buildingTypeAP > 0
            ? round(($buildingTypeEP / $buildingTypeAP) * 100, 2)
            : 0;

        $sustainablePercentage = 0;
        $intelligentPercentage = 0;
        $healthyPercentage = 0;

        if ($classificationData['Sustainable']['available'] > 0) {
            $sustainablePercentage = round(
                ($classificationData['Sustainable']['earned'] / $classificationData['Sustainable']['available']) * 100,
                2
            );
        }

        if ($classificationData['Intelligent']['available'] > 0) {
            $intelligentPercentage = round(
                ($classificationData['Intelligent']['earned'] / $classificationData['Intelligent']['available']) * 100,
                2
            );
        }

        if ($classificationData['Healthy']['available'] > 0) {
            $healthyPercentage = round(
                ($classificationData['Healthy']['earned'] / $classificationData['Healthy']['available']) * 100,
                2
            );
        }

        // Mega building percentage from earned/applied points only
        $megaBuildingPercentage = $megaBuildingAP > 0
            ? round(($megaBuildingEP / $megaBuildingAP) * 100, 2)
            : 0;

        return view('build::building-types.index', [
            'buildingTypes' => $buildingTypes,
            'megaBuilding' => $mega_building,
            'buildingTypePercentages' => $buildingTypePercentages,
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
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
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
    public function destroy(MegaBuilding $mega_building)
    {
    }
}
