<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('institution_name', 255);
            $table->string('slug', 255)->unique();
            $table->enum('institution_type', [
                'University',
                'College'
            ]);

            $table->text('description')->nullable();
            $table->string('logo')->nullable();

            // Contact Information
            $table->string('website_url')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 30)->nullable();

            // Institution Classification
            $table->enum('ownership_type', [
                'Public',
                'Private'
            ]);

            $table->string('accreditation_status')->nullable();

            // Publication and Verification
            $table->enum('verification_status', [
                'Pending',
                'Verified',
                'Rejected'
            ])->default('Pending');

            $table->boolean('is_published')->default(false);

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('institution_name');
            $table->index('institution_type');
            $table->index('ownership_type');
            $table->index('verification_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
