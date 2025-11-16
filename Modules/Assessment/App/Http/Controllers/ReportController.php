<?php

declare(strict_types=1);

namespace Modules\Assessment\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;
use Modules\Assessment\Services\AssessmentGroupService;
use Modules\Build\App\Models\BuildingType as BuildBuildingType;

final class ReportController extends Controller
{
    public function __construct(private AssessmentGroupService $assessmentGroupService)
    {
    }

    public function show(MegaBuilding $megaBuilding): \Illuminate\Contracts\View\View
    {
        // Get all building types
        $buildingTypes = BuildBuildingType::all();

        // Get mega building report data
        $megaBuildingData = $this->assessmentGroupService->getReportData($megaBuilding);

        // Get report data for each building type
        $buildingTypesData = [];
        foreach ($buildingTypes as $buildingType) {
            $buildingTypesData[$buildingType->id] = $this->assessmentGroupService->getReportData($megaBuilding, $buildingType);
        }

        return view('assessment::reports.show', [
            'megaBuilding' => $megaBuilding,
            'buildingTypes' => $buildingTypes,
            'megaBuildingData' => $megaBuildingData,
            'buildingTypesData' => $buildingTypesData,
        ]);
    }
}
