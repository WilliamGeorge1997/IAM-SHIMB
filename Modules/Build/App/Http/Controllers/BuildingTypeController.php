<?php

namespace Modules\Build\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        // Calculate mega building EP and AP - only count earned/applied points
        $megaBuildingEP = 0;
        $megaBuildingAP = 0;
        $megaBuildingRecords = \Modules\Assessment\App\Models\ItemEarnedPoint::where('mega_building_id', $mega_building->id)
            ->with('item')
            ->get()
            ->filter(function ($record) {
                return $record->item && $record->item->type === 'Optional';
            });
        $megaBuildingEP = $megaBuildingRecords->sum('earned_points');
        $megaBuildingAP = $megaBuildingRecords->sum(function ($record) {
            return $record->item->available_points;
        });

        // Calculate classification EP and AP - only count earned/applied points
        $classificationData = [
            'Sustainable' => ['earned' => 0, 'available' => 0],
            'Healthy' => ['earned' => 0, 'available' => 0],
            'Intelligent' => ['earned' => 0, 'available' => 0],
        ];

        // Get all earned points for this mega building, filter by Optional items
        $allEarnedPoints = \Modules\Assessment\App\Models\ItemEarnedPoint::where('mega_building_id', $mega_building->id)
            ->with('item')
            ->get()
            ->filter(function ($record) {
                return $record->item && $record->item->type === 'Optional';
            });

        // Group by classification and sum earned/available points
        foreach ($allEarnedPoints as $record) {
            $classification = $record->item->classification;
            if (isset($classificationData[$classification])) {
                $classificationData[$classification]['earned'] += $record->earned_points;
                $classificationData[$classification]['available'] += $record->item->available_points;
            }
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
