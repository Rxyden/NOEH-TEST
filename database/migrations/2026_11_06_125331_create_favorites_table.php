<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Allows users to favorite different types of records.
            $table->morphs('favoritable');

            $table->timestamps();

            $table->unique(
                ['user_id', 'favoritable_type', 'favoritable_id'],
                'favorites_user_target_unique'
            );

            $table->index('user_id', 'favorites_user_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
