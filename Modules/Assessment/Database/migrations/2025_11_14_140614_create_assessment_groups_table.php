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
        Schema::create('assessment_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $assessmentGroups = [
            ['name' => 'Site & Environment - Assessment Group'],
            ['name' => 'Air - Assessment Group'],
            ['name' => 'Water - Assessment Group'],
            ['name' => 'Energy - Assessment Group'],
            ['name' => 'Mobility - Assessment Group'],
            ['name' => 'Material - Assessment Group'],
            ['name' => 'Visual Quality - Assessment Group'],
            ['name' => 'Acoustic Quality'],
            ['name' => 'Nourishment - Assessment Group'],
            ['name' => 'Fitness - Assessment Group'],
            ['name' => 'Mind - Assessment Group'],
            ['name' => 'Community - Assessment Group'],
            ['name' => 'Innovation - Assessment Group'],
            ['name' => 'Safety - Assessment Group'],
            ['name' => 'Security - Assessment Group'],
            ['name' => 'Services - Assessment Group'],
            ['name' => 'AI-Full Autonomous Buildings - Assessment Group'],
        ];
        AssessmentGroup::insert($assessmentGroups);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_groups');
    }
};
