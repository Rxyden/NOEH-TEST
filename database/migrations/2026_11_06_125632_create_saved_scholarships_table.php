<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saved_scholarships', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('scholarship_id')
                ->constrained('scholarships')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(
                ['user_id', 'scholarship_id'],
                'saved_scholarship_unique'
            );

            $table->index('user_id', 'saved_scholarships_user_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saved_scholarships');
    }
};
