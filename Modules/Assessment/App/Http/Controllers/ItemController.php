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

        // Get percentages
        $assessmentGroupService = app(\Modules\Assessment\Services\AssessmentGroupService::class);
        $groupPercentages = $assessmentGroupService->getGroupPercentages($megaBuilding, $buildingType, $assessmentGroup);
        $megaBuildingPercentage = $this->itemService->getMegaBuildingPercentage($megaBuilding);
        $buildingTypeAveragePercentage = $assessmentGroupService->getBuildingTypeAveragePercentage($megaBuilding, $buildingType);


        return view('assessment::items.index', [
            'items' => $items,
            'megaBuilding' => $megaBuilding,
            'buildingType' => $buildingType,
            'assessmentGroup' => $assessmentGroup,
            'earnedPoints' => $earnedPoints,
            'megaBuildingPercentage' => $megaBuildingPercentage,
            'sustainablePercentage' => (float) ($groupPercentages['Sustainable'] ?? 0),
            'intelligentPercentage' => (float) ($groupPercentages['Intelligent'] ?? 0),
            'healthyPercentage' => (float) ($groupPercentages['Healthy'] ?? 0),
            'buildingTypeAveragePercentage' => $buildingTypeAveragePercentage,
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
