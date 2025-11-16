<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Build\App\Models\BuildingType;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('building_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $buildingTypes = [
            ['name' => 'Residential Building'],
            ['name' => 'Educational Building'],
            ['name' => 'Institutional Building'],
            ['name' => 'Commercial Building'],
            ['name' => 'Business Building'],
            ['name' => 'Industrial Building'],
            ['name' => 'Storage Building'],
            ['name' => 'Hazardous Building'],
            ['name' => 'Special Building (free style)'],
            ['name' => 'Multi-Level Car Parking'],
        ];
        BuildingType::insert($buildingTypes);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('building_types');
    }
};
