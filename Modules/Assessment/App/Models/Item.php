<?php

namespace Modules\Assessment\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Assessment\Database\factories\ItemFactory;
use Modules\Build\App\Models\BuildingType;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'assessment_group_id',
        'building_type_id',
        'classification',
        'type',
        'available_points',
    ];

    /**
     * Get the assessment group this item belongs to.
     */
    public function assessmentGroup(): BelongsTo
    {
        return $this->belongsTo(AssessmentGroup::class);
    }

    /**
     * Get the building type this item belongs to.
     */
    public function buildingType(): BelongsTo
    {
        return $this->belongsTo(BuildingType::class);
    }
}
