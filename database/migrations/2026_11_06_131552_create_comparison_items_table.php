<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comparison_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('comparison_id')
                ->constrained('comparisons')
                ->cascadeOnDelete();

            $table->foreignId('institution_id')
                ->constrained('institutions')
                ->cascadeOnDelete();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->unique(
                ['comparison_id', 'institution_id'],
                'comparison_item_unique'
            );

            $table->index(
                ['comparison_id', 'sort_order'],
                'comparison_items_order_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comparison_items');
    }
};
