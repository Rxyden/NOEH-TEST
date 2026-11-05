<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();

            // User Relationship
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Role Relationship
            $table->foreignId('role_id')
                ->constrained('roles')
                ->cascadeOnDelete();

            // Institution Relationship
            // NULL means this is a global role.
            $table->foreignId('institution_id')
                ->nullable()
                ->constrained('institutions')
                ->nullOnDelete();

            $table->timestamps();

            $table->unique(
                ['user_id', 'role_id', 'institution_id'],
                'user_roles_assignment_unique'
            );

            $table->index('institution_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
