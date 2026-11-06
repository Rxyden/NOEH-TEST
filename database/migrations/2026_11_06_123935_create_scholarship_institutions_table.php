<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scholarship_institutions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('scholarship_id')
                ->constrained('scholarships')
                ->cascadeOnDelete();

            $table->foreignId('institution_id')
                ->constrained('institutions')
                ->cascadeOnDelete();

            $table->text('availability_notes')->nullable();

            $table->timestamps();

            $table->unique(
                ['scholarship_id', 'institution_id'],
                'scholarship_institution_unique'
            );

            $table->index('institution_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarship_institutions');
    }
};
