<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_cycles', function (Blueprint $table) {
            $table->id();

            // Institution Relationship
            $table->foreignId('institution_id')
                ->constrained('institutions')
                ->cascadeOnDelete();

            // Campus Relationship (Optional)
            $table->foreignId('campus_id')
                ->nullable()
                ->constrained('campuses')
                ->nullOnDelete();

            // Admission Information
            $table->string('academic_year', 20);
            $table->string('term', 100)->nullable();

            $table->date('application_start_date')->nullable();
            $table->date('application_end_date')->nullable();

            // Official Application Portal
            $table->string('application_url')->nullable();

            // Admission Instructions
            $table->text('instructions')->nullable();

            // Admission Status
            $table->enum('admission_status', [
                'Upcoming',
                'Open',
                'Closed',
                'Suspended'
            ])->default('Upcoming');

            $table->boolean('is_published')->default(false);

            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('academic_year');
            $table->index('admission_status');
            $table->index(['institution_id', 'admission_status']);
           $table->index(['application_start_date', 'application_end_date'],
           'admission_dates_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_cycles');
    }
};
