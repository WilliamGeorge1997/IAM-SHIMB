<?php

namespace Modules\Build\Services;

use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;
use Modules\Assessment\App\Models\Item;
use Modules\Assessment\App\Models\ItemEarnedPoint;

class BuildingTypeService
{
    function findAll(): mixed
    {
        return BuildingType::all();
    }

    public function getBuildingTypePercentages(MegaBuilding $megaBuilding, BuildingType $buildingType): array
    {

        $items = Item::where('type', 'Optional')->get();

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
}
