<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scholarship_requirements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('scholarship_id')
                ->constrained('scholarships')
                ->cascadeOnDelete();

            $table->string('requirement_name', 255);
            $table->text('description')->nullable();

            $table->boolean('is_required')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->index(
                ['scholarship_id', 'is_required'],
                'scholarship_req_required_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarship_requirements');
    }
};
