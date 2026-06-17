<?php

namespace Modules\Assessment\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Assessment\Database\factories\AssessmentGroupFactory;
use Modules\Build\App\Models\BuildingType;

class AssessmentGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'building_type_id'];

    /**
     * Get the building type this group belongs to.
     */
    public function buildingType(): BelongsTo
    {
        return $this->belongsTo(BuildingType::class);
    }

    /**
     * Get the items for this assessment group.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
