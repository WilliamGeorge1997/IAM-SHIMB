<?php

declare(strict_types=1);

namespace Modules\Assessment\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;

final class ItemEarnedPoint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'mega_building_id',
        'building_type_id',
        'item_id',
        'earned_points',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'earned_points' => 'decimal:2',
    ];

    /**
     * Get the mega building that owns the earned point.
     */
    public function megaBuilding(): BelongsTo
    {
        return $this->belongsTo(MegaBuilding::class);
    }

    /**
     * Get the building type that owns the earned point.
     */
    public function buildingType(): BelongsTo
    {
        return $this->belongsTo(BuildingType::class);
    }

    /**
     * Get the item that owns the earned point.
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
