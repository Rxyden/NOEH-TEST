<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('admission_cycle_id')
                ->constrained('admission_cycles')
                ->cascadeOnDelete();

            $table->string('office_name', 150)->nullable();
            $table->string('contact_person', 150)->nullable();

            $table->string('email', 255)->nullable();
            $table->string('phone', 30)->nullable();

            $table->text('office_address')->nullable();
            $table->string('office_hours', 150)->nullable();

            $table->boolean('is_primary')->default(false);

            $table->timestamps();

            $table->index(
                ['admission_cycle_id', 'is_primary'],
                'adm_contact_primary_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_contacts');
    }
};
