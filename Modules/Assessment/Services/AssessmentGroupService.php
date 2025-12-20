<?php

namespace Modules\Assessment\Services;

use Modules\Assessment\App\Models\AssessmentGroup;
use Modules\Assessment\App\Models\Item;
use Modules\Assessment\App\Models\ItemEarnedPoint;
use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;

class AssessmentGroupService
{
    function findAll()
    {
        return AssessmentGroup::all();
    }

    public function getGroupPercentagesWithData(MegaBuilding $megaBuilding, BuildingType $buildingType, AssessmentGroup $assessmentGroup): array
    {
        $items = Item::where('assessment_group_id', $assessmentGroup->id)
            ->where('type', 'Optional')
            ->get();

        $itemIds = $items->pluck('id')->toArray();

        $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
            ->where('building_type_id', $buildingType->id)
            ->whereIn('item_id', $itemIds)
            ->get()
            ->keyBy('item_id');

        $totals = [
            'Sustainable' => ['earned' => 0, 'available' => 0],
            'Healthy' => ['earned' => 0, 'available' => 0],
            'Intelligent' => ['earned' => 0, 'available' => 0],
        ];

        foreach ($items as $item) {
            $classification = $item->classification;
            $availablePoints = (float) $item->available_points;
            $earnedPoint = $earnedPoints->get($item->id);
            $earnedPointValue = $earnedPoint ? (float) $earnedPoint->earned_points : 0;

            $totals[$classification]['available'] += $availablePoints;
            $totals[$classification]['earned'] += $earnedPointValue;
        }

        return $totals;
    }

    public function getGroupPercentages(MegaBuilding $megaBuilding, BuildingType $buildingType, AssessmentGroup $assessmentGroup): array
    {
        $items = Item::where('assessment_group_id', $assessmentGroup->id)
            ->where('type', 'Optional')
            ->get();

        $itemIds = $items->pluck('id')->toArray();

        $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
            ->where('building_type_id', $buildingType->id)
            ->whereIn('item_id', $itemIds)
            ->get()
            ->keyBy('item_id');

        $totals = [
            'Sustainable' => ['earned' => 0, 'available' => 0],
            'Healthy' => ['earned' => 0, 'available' => 0],
            'Intelligent' => ['earned' => 0, 'available' => 0],
        ];

        foreach ($items as $item) {
            $classification = $item->classification;
            $availablePoints = (float) $item->available_points;
            $earnedPoint = $earnedPoints->get($item->id);
            $earnedPointValue = $earnedPoint ? (float) $earnedPoint->earned_points : 0;

            $totals[$classification]['available'] += $availablePoints;
            $totals[$classification]['earned'] += $earnedPointValue;
        }

        $percentages = [];
        foreach ($totals as $classification => $data) {
            if ($data['available'] > 0) {
                $percentage = ($data['earned'] / $data['available']) * 100;
                if ($percentage > 0) {
                    $percentages[$classification] = number_format($percentage, 2);
                }
            }
        }

        return $percentages;
    }

    public function getReportData(MegaBuilding $megaBuilding, ?BuildingType $buildingType = null): array
    {
        $classifications = ['Sustainable', 'Healthy', 'Intelligent'];
        $result = [];

        foreach ($classifications as $classification) {

            $items = Item::where('classification', $classification)->get();

            if ($buildingType) {

                $itemIds = $items->pluck('id')->toArray();
                $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                    ->where('building_type_id', $buildingType->id)
                    ->whereIn('item_id', $itemIds)
                    ->get()
                    ->keyBy('item_id');

                $essentialItems = $items->where('type', 'Essential');
                $essentialItemIds = $essentialItems->pluck('id')->toArray();
                $earnedEssentialPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                    ->where('building_type_id', $buildingType->id)
                    ->whereIn('item_id', $essentialItemIds)
                    ->get();

                $ap = $earnedEssentialPoints->count();

                $optionalItems = $items->where('type', 'Optional');
                $totalAvailable = 0;
                $totalEarned = 0;

                foreach ($optionalItems as $item) {
                    $totalAvailable += (float) $item->available_points;
                    $earnedPoint = $earnedPoints->get($item->id);
                    if ($earnedPoint) {
                        $totalEarned += (float) $earnedPoint->earned_points;
                    }
                }

                $percentage = $totalAvailable > 0 ? round(($totalEarned / $totalAvailable) * 100, 2) : 0;

                $result[$classification] = [
                    'ap' => $ap,
                    'ep' => round($totalEarned, 2),
                    'total' => round($totalAvailable, 2),
                    'percentage' => $percentage,
                ];
            } else {

                $allBuildingTypes = BuildingType::all();
                $totalAvailable = 0;
                $totalEarned = 0;
                $totalEssentialCount = 0;

                foreach ($allBuildingTypes as $bt) {
                    $itemIds = $items->pluck('id')->toArray();
                    $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                        ->where('building_type_id', $bt->id)
                        ->whereIn('item_id', $itemIds)
                        ->get()
                        ->keyBy('item_id');

                    $essentialItems = $items->where('type', 'Essential');
                    $essentialItemIds = $essentialItems->pluck('id')->toArray();
                    $earnedEssentialPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                        ->where('building_type_id', $bt->id)
                        ->whereIn('item_id', $essentialItemIds)
                        ->get();

                    $totalEssentialCount += $earnedEssentialPoints->count();

                    $optionalItems = $items->where('type', 'Optional');
                    foreach ($optionalItems as $item) {
                        $totalAvailable += (float) $item->available_points;
                        $earnedPoint = $earnedPoints->get($item->id);
                        if ($earnedPoint) {
                            $totalEarned += (float) $earnedPoint->earned_points;
                        }
                    }
                }

                $percentage = $totalAvailable > 0 ? round(($totalEarned / $totalAvailable) * 100, 2) : 0;

                $result[$classification] = [
                    'ap' => $totalEssentialCount,
                    'ep' => round($totalEarned, 2),
                    'total' => round($totalAvailable, 2),
                    'percentage' => $percentage,
                ];
            }
        }

        return $result;
    }

    public function getBuildingTypeAveragePercentage(MegaBuilding $megaBuilding, BuildingType $buildingType): float
    {

        $assessmentGroups = AssessmentGroup::all();

        if ($assessmentGroups->isEmpty()) {
            return 0.0;
        }

        $totalAvailable = 0.0;
        $totalEarned = 0.0;


        foreach ($assessmentGroups as $group) {
            $optionalItems = Item::where('assessment_group_id', $group->id)
                ->where('type', 'Optional')
                ->get();

            if ($optionalItems->isEmpty()) {
                continue;
            }

            $itemIds = $optionalItems->pluck('id');
            $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                ->where('building_type_id', $buildingType->id)
                ->whereIn('item_id', $itemIds)
                ->get()
                ->keyBy('item_id');


            $groupAvailable = $optionalItems->sum(fn(Item $item): float => (float) $item->available_points);


            $groupEarned = $optionalItems->sum(function (Item $item) use ($earnedPoints): float {
                $earnedPoint = $earnedPoints->get($item->id);
                return $earnedPoint ? (float) $earnedPoint->earned_points : 0.0;
            });

            $totalAvailable += $groupAvailable;
            $totalEarned += $groupEarned;
        }

        if ($totalAvailable <= 0) {
            return 0.0;
        }


        return round(($totalEarned / $totalAvailable) * 100, 2);
    }

    /**
     * Get classification data (Sustainable, Healthy, Intelligent) aggregated across ALL building types for a mega building.
     * This is used for the mega building overall metrics.
     * Only counts items that have been evaluated (have ItemEarnedPoint records).
     */
    public function getMegaBuildingClassificationData(MegaBuilding $megaBuilding): array
    {
        $classificationData = [
            'Sustainable' => ['earned' => 0, 'available' => 0],
            'Healthy' => ['earned' => 0, 'available' => 0],
            'Intelligent' => ['earned' => 0, 'available' => 0],
        ];

        // Get all earned points for this mega building, filter by Optional items
        // This only includes items that have been evaluated (have ItemEarnedPoint records)
        $allEarnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
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

        // Calculate percentages
        $result = [];
        foreach ($classificationData as $classification => $data) {
            $percentage = 0;
            if ($data['available'] > 0) {
                $percentage = round(($data['earned'] / $data['available']) * 100, 2);
            }
            $result[$classification] = [
                'earned' => round($data['earned'], 2),
                'available' => round($data['available'], 2),
                'percentage' => $percentage,
            ];
        }

        return $result;
    }
}
