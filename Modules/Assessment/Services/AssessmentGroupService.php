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
            // Get all items for this classification
            $items = Item::where('classification', $classification)->get();

            if ($buildingType) {
                // Calculate for specific building type
                $itemIds = $items->pluck('id')->toArray();
                $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                    ->where('building_type_id', $buildingType->id)
                    ->whereIn('item_id', $itemIds)
                    ->get()
                    ->keyBy('item_id');
            } else {
                // Calculate for mega building (aggregate across all building types)
                $itemIds = $items->pluck('id')->toArray();
                $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                    ->whereIn('item_id', $itemIds)
                    ->get()
                    ->groupBy('item_id')
                    ->map(function ($group) {
                        // Sum earned points across all building types for this item
                        return (object) ['earned_points' => $group->sum('earned_points')];
                    });
            }

            // Calculate Essential Items (AP)
            $essentialItems = $items->where('type', 'Essential');
            $essentialItemIds = $essentialItems->pluck('id')->toArray();

            if ($buildingType) {
                $earnedEssentialPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                    ->where('building_type_id', $buildingType->id)
                    ->whereIn('item_id', $essentialItemIds)
                    ->get();
            } else {
                $earnedEssentialPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                    ->whereIn('item_id', $essentialItemIds)
                    ->get();
            }

            // Count essential items that have earned points (meaning they were checked/earned)
            $ap = $earnedEssentialPoints->count();

            // Calculate Optional Items (EP and Total)
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

            // Calculate percentage (EP / Total Available) * 100
            $percentage = $totalAvailable > 0 ? round(($totalEarned / $totalAvailable) * 100, 2) : 0;

            $result[$classification] = [
                'ap' => $ap, // Essential Items count
                'ep' => round($totalEarned, 2), // Earned Points
                'total' => round($totalAvailable, 2), // Total Available Points
                'percentage' => $percentage, // Percentage
            ];
        }

        return $result;
    }
}
