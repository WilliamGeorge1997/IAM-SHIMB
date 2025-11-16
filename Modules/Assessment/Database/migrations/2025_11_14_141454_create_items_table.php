<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Assessment\App\Models\AssessmentGroup;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignIdFor(AssessmentGroup::class)->index()->constrained()->cascadeOnDelete();
            $table->enum('classification', ['Sustainable', 'Intelligent', 'Healthy']);
            $table->enum('type', ['Essential', 'Optional']);
            $table->unsignedSmallInteger('available_points');
            $table->timestamps();
        });

        $items = [
            ['name' => 'Smart sustainable infrastructure (BMS & IoT Edge)', 'assessment_group_id' => 1, 'description' => 'Description available from construction', 'classification' => 'Sustainable', 'type' => 'Essential', 'available_points' => 0,],
            ['name' => 'Group Item 30', 'description' => 'Description Item 30', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 10],
            ['name' => 'Group Item 31', 'description' => 'Description Item 31', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 10],
            ['name' => 'Group Item 32', 'description' => 'Description Item 32', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 9],
            ['name' => 'Group Item 33', 'description' => 'Description Item 33', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 7],
            ['name' => 'Group Item 34', 'description' => 'Description Item 34', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 3],
            ['name' => 'Group Item 35', 'description' => 'Description Item 35', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 2],
            ['name' => 'Group Item 36', 'description' => 'Description Item 36', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 2],
            ['name' => 'Group Item 37', 'description' => 'Description Item 37', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 1],
            ['name' => 'Group Item 38', 'description' => 'Description Item 38', 'assessment_group_id' => 1, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 1],
            ['name' => 'Group Item 39', 'description' => 'Description Item 39', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 5],
            ['name' => 'Group Item 40', 'description' => 'Description Item 40', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 5],
            ['name' => 'Group Item 41', 'description' => 'Description Item 41', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 5],
            ['name' => 'Group Item 42', 'description' => 'Description Item 42', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 5],
            ['name' => 'Group Item 43', 'description' => 'Description Item 43', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 44', 'description' => 'Description Item 44', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 45', 'description' => 'Description Item 45', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 46', 'description' => 'Description Item 46', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 47', 'description' => 'Description Item 47', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 48', 'description' => 'Description Item 48', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 3],
            ['name' => 'Group Item 49', 'description' => 'Description Item 49', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 3],
            ['name' => 'Group Item 50', 'description' => 'Description Item 50', 'assessment_group_id' => 1, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 3],

            ['name' => 'Group Item 51', 'description' => 'Description Item 51', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 52', 'description' => 'Description Item 52', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 53', 'description' => 'Description Item 53', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 54', 'description' => 'Description Item 54', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 55', 'description' => 'Description Item 55', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 56', 'description' => 'Description Item 56', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 57', 'description' => 'Description Item 57', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 58', 'description' => 'Description Item 58', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 3],
            ['name' => 'Group Item 59', 'description' => 'Description Item 59', 'assessment_group_id' => 2, 'classification' => 'Sustainable', 'type' => 'Optional', 'available_points' => 2],
            ['name' => 'Group Item 60', 'description' => 'Description Item 60', 'assessment_group_id' => 2, 'classification' => 'Healthy', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 61', 'description' => 'Description Item 61', 'assessment_group_id' => 2, 'classification' => 'Healthy', 'type' => 'Essential', 'available_points' => 0],
            ['name' => 'Group Item 62', 'description' => 'Description Item 62', 'assessment_group_id' => 2, 'classification' => 'Healthy', 'type' => 'Optional', 'available_points' => 1],
            ['name' => 'Group Item 63', 'description' => 'Description Item 63', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 5],
            ['name' => 'Group Item 64', 'description' => 'Description Item 64', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 65', 'description' => 'Description Item 65', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 66', 'description' => 'Description Item 66', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 67', 'description' => 'Description Item 67', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 68', 'description' => 'Description Item 68', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 69', 'description' => 'Description Item 69', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 70', 'description' => 'Description Item 70', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 71', 'description' => 'Description Item 71', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 72', 'description' => 'Description Item 72', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 73', 'description' => 'Description Item 73', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 74', 'description' => 'Description Item 74', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 4],
            ['name' => 'Group Item 75', 'description' => 'Description Item 75', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 3],
            ['name' => 'Group Item 76', 'description' => 'Description Item 76', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 3],
            ['name' => 'Group Item 77', 'description' => 'Description Item 77', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 3],
            ['name' => 'Group Item 78', 'description' => 'Description Item 78', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 3],
            ['name' => 'Group Item 79', 'description' => 'Description Item 79', 'assessment_group_id' => 2, 'classification' => 'Intelligent', 'type' => 'Optional', 'available_points' => 3],

        ];

        \DB::table('items')->insert($items);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
