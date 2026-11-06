<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcement_institutions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('announcement_id')
                ->constrained('announcements')
                ->cascadeOnDelete();

            $table->foreignId('institution_id')
                ->constrained('institutions')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(
                ['announcement_id', 'institution_id'],
                'announcement_institution_unique'
            );

            $table->index('institution_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcement_institutions');
    }
};
