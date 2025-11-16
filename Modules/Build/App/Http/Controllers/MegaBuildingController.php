<?php

namespace Modules\Build\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Build\App\Http\Requests\MegaBuildingRequest;
use Modules\Build\App\Models\MegaBuilding;
use Modules\Build\Services\MegaBuildingService;

class MegaBuildingController extends Controller
{
    public function __construct(private MegaBuildingService $megaBuildingService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $megaBuildings = $this->megaBuildingService->findAll($data, []);

        return view('build::mega-buildings.index', ['megaBuildings' => $megaBuildings]);
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
    public function store(MegaBuildingRequest $request)
    {
        $megaBuilding = $this->megaBuildingService->save($request->validated());
        return redirect()->route('mega-buildings.index');
    }
    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('build::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('build::edit');
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
        $mega_building->delete();
        return redirect()->route('mega-buildings.index');
    }
}
