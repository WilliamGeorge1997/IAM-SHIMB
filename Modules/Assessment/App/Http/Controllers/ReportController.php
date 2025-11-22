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
        $buildingTypes = BuildBuildingType::all();

        $megaBuildingData = $this->assessmentGroupService->getReportData($megaBuilding);

        $buildingTypesData = [];
        foreach ($buildingTypes as $buildingType) {
            $buildingTypesData[$buildingType->id] = $this->assessmentGroupService->getReportData($megaBuilding, $buildingType);
        }

        $sustainablePct = $megaBuildingData['Sustainable']['percentage'] ?? 0;
        $healthyPct = $megaBuildingData['Healthy']['percentage'] ?? 0;
        $intelligentPct = $megaBuildingData['Intelligent']['percentage'] ?? 0;

        $overallMegaBuildingPercentage = round(($sustainablePct + $healthyPct + $intelligentPct) / 3, 2);

        $sustainableTotal = 0;
        $healthyTotal = 0;
        $intelligentTotal = 0;
        $count = 0;

        foreach ($buildingTypesData as $data) {
            if (isset($data['Sustainable']['percentage'])) {
                $sustainableTotal += $data['Sustainable']['percentage'];
            }
            if (isset($data['Healthy']['percentage'])) {
                $healthyTotal += $data['Healthy']['percentage'];
            }
            if (isset($data['Intelligent']['percentage'])) {
                $intelligentTotal += $data['Intelligent']['percentage'];
            }
            $count++;
        }

        $averageSustainable = $count > 0 ? round($sustainableTotal / $count, 2) : 0;
        $averageHealthy = $count > 0 ? round($healthyTotal / $count, 2) : 0;
        $averageIntelligent = $count > 0 ? round($intelligentTotal / $count, 2) : 0;


        $buildingTypesOverall = [];
        foreach ($buildingTypesData as $buildingTypeId => $data) {
            $sustPct = $data['Sustainable']['percentage'] ?? 0;
            $healthPct = $data['Healthy']['percentage'] ?? 0;
            $intelPct = $data['Intelligent']['percentage'] ?? 0;

            $buildingTypesOverall[$buildingTypeId] = round(($sustPct + $healthPct + $intelPct) / 3, 2);
        }

        return view('assessment::reports.show', [
            'megaBuilding' => $megaBuilding,
            'buildingTypes' => $buildingTypes,
            'megaBuildingData' => $megaBuildingData,
            'buildingTypesData' => $buildingTypesData,
            'overallMegaBuildingPercentage' => $overallMegaBuildingPercentage,
            'averageSustainable' => $averageSustainable,
            'averageHealthy' => $averageHealthy,
            'averageIntelligent' => $averageIntelligent,
            'buildingTypesOverall' => $buildingTypesOverall,
        ]);
    }
}
