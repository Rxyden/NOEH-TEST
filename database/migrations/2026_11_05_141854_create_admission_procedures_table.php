<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_procedures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('admission_cycle_id')
                ->constrained('admission_cycles')
                ->cascadeOnDelete();

            $table->unsignedInteger('step_number');
            $table->string('step_title', 255);
            $table->text('step_description');

            $table->string('reference_url')->nullable();

            $table->timestamps();

            $table->unique(
                ['admission_cycle_id', 'step_number'],
                'adm_procedure_step_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_procedures');
    }
};
