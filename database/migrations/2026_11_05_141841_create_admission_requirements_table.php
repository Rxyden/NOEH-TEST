<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_requirements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('admission_cycle_id')
                ->constrained('admission_cycles')
                ->cascadeOnDelete();

            $table->string('requirement_name', 255);
            $table->text('description')->nullable();

            $table->boolean('is_required')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(
                ['admission_cycle_id', 'is_required'],
                'adm_req_cycle_required_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_requirements');
    }
};
