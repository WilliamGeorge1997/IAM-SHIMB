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

            $items = Item::where('classification', $classification)->get();

            if ($buildingType) {

                $itemIds = $items->pluck('id')->toArray();
                $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                    ->where('building_type_id', $buildingType->id)
                    ->whereIn('item_id', $itemIds)
                    ->get()
                    ->keyBy('item_id');
            } else {

                $itemIds = $items->pluck('id')->toArray();
                $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
                    ->whereIn('item_id', $itemIds)
                    ->get()
                    ->groupBy('item_id')
                    ->map(function ($group) {

                        return (object) ['earned_points' => $group->sum('earned_points')];
                    });
            }


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
}
