<?php

namespace Modules\Assessment\App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;
use Modules\Assessment\Services\ItemService;
use Modules\Assessment\App\Models\AssessmentGroup;

final class ItemController extends Controller
{
    public function __construct(private ItemService $itemService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(MegaBuilding $megaBuilding, BuildingType $buildingType, AssessmentGroup $assessmentGroup)
    {
        $items = $this->itemService->findAll($assessmentGroup->id);
        $itemIds = $items->pluck('id')->toArray();
        $earnedPoints = $this->itemService->getEarnedPointsForItems($megaBuilding, $buildingType, $itemIds);


        $assessmentGroupService = app(\Modules\Assessment\Services\AssessmentGroupService::class);
        $groupPercentages = $assessmentGroupService->getGroupPercentages($megaBuilding, $buildingType, $assessmentGroup);
        $megaBuildingPercentage = $this->itemService->getMegaBuildingPercentage($megaBuilding);
        $buildingTypeAveragePercentage = $assessmentGroupService->getBuildingTypeAveragePercentage($megaBuilding, $buildingType);


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


        $classificationData = $assessmentGroupService->getGroupPercentagesWithData($megaBuilding, $buildingType, $assessmentGroup);

        return view('assessment::items.index', [
            'items' => $items,
            'megaBuilding' => $megaBuilding,
            'buildingType' => $buildingType,
            'assessmentGroup' => $assessmentGroup,
            'earnedPoints' => $earnedPoints,
            'megaBuildingPercentage' => $megaBuildingPercentage,
            'megaBuildingEP' => round($megaBuildingEP, 2),
            'megaBuildingAP' => round($megaBuildingAP, 2),
            'sustainablePercentage' => (float) ($groupPercentages['Sustainable'] ?? 0),
            'sustainableEP' => round($classificationData['Sustainable']['earned'] ?? 0, 2),
            'sustainableAP' => round($classificationData['Sustainable']['available'] ?? 0, 2),
            'intelligentPercentage' => (float) ($groupPercentages['Intelligent'] ?? 0),
            'intelligentEP' => round($classificationData['Intelligent']['earned'] ?? 0, 2),
            'intelligentAP' => round($classificationData['Intelligent']['available'] ?? 0, 2),
            'healthyPercentage' => (float) ($groupPercentages['Healthy'] ?? 0),
            'healthyEP' => round($classificationData['Healthy']['earned'] ?? 0, 2),
            'healthyAP' => round($classificationData['Healthy']['available'] ?? 0, 2),
            'buildingTypeAveragePercentage' => $buildingTypeAveragePercentage,
            'buildingTypeEP' => round($buildingTypeEP, 2),
            'buildingTypeAP' => round($buildingTypeAP, 2),
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }

    /**
     * Store earned points for items.
     */
    public function storeEarnedPoints(Request $request, MegaBuilding $megaBuilding, BuildingType $buildingType, AssessmentGroup $assessmentGroup): RedirectResponse
    {
        $validated = $request->validate([
            'earned_points' => 'required|array',
            'earned_points.*' => 'required|numeric|in:0,1',
        ]);


        $items = $this->itemService->findAll($assessmentGroup->id);

        $this->itemService->storeEarnedPoints(
            $megaBuilding,
            $buildingType,
            $assessmentGroup,
            $validated['earned_points'],
            $items
        );

        return redirect()
            ->route('assessment-groups.index', [$megaBuilding, $buildingType, $assessmentGroup])
            ->with('success', 'Earned points saved successfully.');
    }
}
