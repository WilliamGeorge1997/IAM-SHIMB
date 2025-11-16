<?php

namespace Modules\Assessment\Services;
use Illuminate\Support\Facades\DB;
use Modules\Assessment\App\Models\Item;
use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;
use Modules\Assessment\App\Models\AssessmentGroup;
use Modules\Assessment\App\Models\ItemEarnedPoint;


class ItemService
{

    function findAll($assessmentGroupId)
    {
        return Item::where('assessment_group_id', $assessmentGroupId)->get();
    }


    public function storeEarnedPoints(MegaBuilding $megaBuilding, BuildingType $buildingType, AssessmentGroup $assessmentGroup, array $earnedPoints, $items): void
    {
        DB::transaction(function () use ($megaBuilding, $buildingType, $assessmentGroup, $earnedPoints, $items) {
            foreach ($earnedPoints as $itemId => $toggleValue) {
                $item = $items->firstWhere('id', $itemId);
                if (!$item || $item->assessment_group_id !== $assessmentGroup->id) {
                    continue;
                }
                $earnedPointsValue = 0;
                if ($toggleValue == 1) {
                    if ($item->type === 'Essential') {
                        $earnedPointsValue = 0;
                    } else {
                        $earnedPointsValue = (float) $item->available_points;
                    }
                }
                ItemEarnedPoint::updateOrCreate(
                    [
                        'mega_building_id' => $megaBuilding->id,
                        'building_type_id' => $buildingType->id,
                        'item_id' => $itemId,
                    ],
                    [
                        'earned_points' => $earnedPointsValue,
                    ]
                );
            }
        });
    }



    public function getEarnedPointsForItems(MegaBuilding $megaBuilding, BuildingType $buildingType, array $itemIds): array
    {
        $earnedPoints = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
            ->where('building_type_id', $buildingType->id)
            ->whereIn('item_id', $itemIds)
            ->get()
            ->keyBy('item_id')
            ->map(function ($item) {
                return [
                    'earned_points' => $item->earned_points,
                ];
            })
            ->toArray();

        return $earnedPoints;
    }

    public function getMegaBuildingPercentage(MegaBuilding $megaBuilding): float
    {

        $earnedPointsRecords = ItemEarnedPoint::where('mega_building_id', $megaBuilding->id)
            ->with('item')
            ->get();

        if ($earnedPointsRecords->isEmpty()) {
            return 0;
        }


        $optionalRecords = $earnedPointsRecords->filter(function ($record) {
            return $record->item && $record->item->type === 'Optional';
        });

        if ($optionalRecords->isEmpty()) {
            return 0;
        }


        $totalEarned = $optionalRecords->sum('earned_points');




        $totalAvailable = $optionalRecords->sum(function ($record) {
            return $record->item->available_points;
        });


        if ($totalAvailable > 0) {
            return round(($totalEarned / $totalAvailable) * 100, 2);
        }

        return 0;
    }
}
