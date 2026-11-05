<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();

            // Institution Relationship
            $table->foreignId('institution_id')
                ->constrained('institutions')
                ->cascadeOnDelete();

            // Program Information
            $table->string('program_name', 255);
            $table->string('program_code', 50);
            $table->string('slug', 255);

            $table->enum('degree_level', [
                'Certificate',
                'Associate',
                'Bachelor',
                'Master',
                'Doctorate',
                'Diploma',
                'Other'
            ])->default('Bachelor');

            $table->text('description')->nullable();

            // Program Duration
            $table->decimal('duration_years', 4, 1)->nullable();

            // Program Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            // Prevent duplicate program codes within one institution
            $table->unique(
                ['institution_id', 'program_code'],
                'programs_institution_code_unique'
            );

            $table->unique(
                ['institution_id', 'slug'],
                'programs_institution_slug_unique'
            );

            $table->index('program_name');
            $table->index('degree_level');
            $table->index(['institution_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
