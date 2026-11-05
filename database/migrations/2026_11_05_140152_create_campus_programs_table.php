<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campus_programs', function (Blueprint $table) {
            $table->id();

            // Campus Relationship
            $table->foreignId('campus_id')
                ->constrained('campuses')
                ->cascadeOnDelete();

            // Academic Program Relationship
            $table->foreignId('program_id')
                ->constrained('programs')
                ->cascadeOnDelete();

            // Availability Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // Prevent duplicate program assignments per campus
            $table->unique(
                ['campus_id', 'program_id'],
                'campus_programs_assignment_unique'
            );

            $table->index(['campus_id', 'is_active']);
            $table->index(['program_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campus_programs');
    }
};
