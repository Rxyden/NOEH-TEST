<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->id();

            // Institution Relationship
            $table->foreignId('institution_id')
                ->constrained('institutions')
                ->cascadeOnDelete();

            // Campus Information
            $table->string('campus_name', 255);
            $table->string('slug', 255)->unique();

            $table->enum('campus_type', [
                'Main',
                'Branch'
            ])->default('Branch');

            // Address Information
            $table->text('address')->nullable();
            $table->string('barangay', 150)->nullable();
            $table->string('city_municipality', 150);
            $table->string('province', 150)->default('Negros Occidental');
            $table->string('postal_code', 10)->nullable();

            // Map Coordinates
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Campus Status
            $table->boolean('is_main_campus')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index('campus_name');
            $table->index('city_municipality');
            $table->index(['institution_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campuses');
    }
};
