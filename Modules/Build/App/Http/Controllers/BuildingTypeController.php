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

        // Calculate mega building percentage
        $itemService = app(\Modules\Assessment\Services\ItemService::class);
        $megaBuildingPercentage = $itemService->getMegaBuildingPercentage($mega_building);

        // Calculate mega building EP and AP
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

        // Calculate individual building type percentages and EP/AP
        $buildingTypeGaugeData = [];
        $assessmentGroupService = app(\Modules\Assessment\Services\AssessmentGroupService::class);

        foreach ($buildingTypes as $buildingType) {
            $btPercentage = $assessmentGroupService->getBuildingTypeAveragePercentage($mega_building, $buildingType);

            // Calculate EP and AP for this building type
            $btRecords = \Modules\Assessment\App\Models\ItemEarnedPoint::where('mega_building_id', $mega_building->id)
                ->where('building_type_id', $buildingType->id)
                ->with('item')
                ->get()
                ->filter(function ($record) {
                    return $record->item && $record->item->type === 'Optional';
                });

            $buildingTypeGaugeData[$buildingType->id] = [
                'percentage' => $btPercentage,
                'ep' => round($btRecords->sum('earned_points'), 2),
                'ap' => round($btRecords->sum(function ($record) {
                    return $record->item->available_points;
                }), 2),
            ];
        }

        return view('build::building-types.index', [
            'buildingTypes' => $buildingTypes,
            'megaBuilding' => $mega_building,
            'buildingTypePercentages' => $buildingTypePercentages,
            'megaBuildingPercentage' => $megaBuildingPercentage,
            'megaBuildingEP' => round($megaBuildingEP, 2),
            'megaBuildingAP' => round($megaBuildingAP, 2),
            'buildingTypeGaugeData' => $buildingTypeGaugeData,
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
