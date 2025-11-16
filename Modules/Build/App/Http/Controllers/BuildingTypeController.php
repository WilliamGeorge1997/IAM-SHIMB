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

        return view('build::building-types.index', [
            'buildingTypes' => $buildingTypes,
            'megaBuilding' => $mega_building,
            'buildingTypePercentages' => $buildingTypePercentages,
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
