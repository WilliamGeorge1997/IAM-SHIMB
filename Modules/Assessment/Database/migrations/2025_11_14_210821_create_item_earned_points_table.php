<?php

use Illuminate\Support\Facades\Schema;
use Modules\Assessment\App\Models\Item;
use Illuminate\Database\Schema\Blueprint;
use Modules\Build\App\Models\BuildingType;
use Modules\Build\App\Models\MegaBuilding;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_earned_points', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MegaBuilding::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(BuildingType::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Item::class)->constrained()->cascadeOnDelete();
            $table->unsignedDecimal('earned_points')->default(0);
            $table->timestamps();
            $table->unique(['mega_building_id', 'building_type_id', 'item_id'], 'unique_item_earned_points');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_earned_points');
    }
};
