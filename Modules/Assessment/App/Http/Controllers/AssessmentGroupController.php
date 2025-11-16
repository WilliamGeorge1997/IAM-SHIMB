<?php

namespace Modules\Assessment\App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;
use Modules\Assessment\Services\AssessmentGroupService;

class AssessmentGroupController extends Controller
{
    public function __construct(private AssessmentGroupService $assessmentGroupService)
    {
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
        return view('assessment::assessment-groups.index', [
            'assessmentGroups' => $assessmentGroups,
            'megaBuilding' => $megaBuilding,
            'buildingType' => $buildingType,
            'groupPercentages' => $groupPercentages,
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
