<?php

namespace Modules\Build\Services;

use Modules\Build\App\Models\MegaBuilding;

class MegaBuildingService
{

    function findAll($data = [], $relations = []): mixed
    {
        $megaBuildings = MegaBuilding::query();
        return getCaseCollection($megaBuildings, $data);
    }

    function save($data): mixed
    {
        return MegaBuilding::create($data);
    }
}
