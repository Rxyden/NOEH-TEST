<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();

            // Scholarship Information
            $table->string('scholarship_name', 255);
            $table->string('slug', 255)->unique();
            $table->string('provider_name', 255);

            $table->enum('scholarship_type', [
                'Government',
                'Private',
                'Institutional',
                'Non-Profit',
                'Other'
            ])->default('Other');

            $table->text('description')->nullable();

            // Financial Benefits
            $table->text('benefits')->nullable();
            $table->decimal('financial_amount', 12, 2)->nullable();

            $table->enum('coverage_type', [
                'Full',
                'Partial',
                'Allowance',
                'Other'
            ])->default('Other');

            // Eligibility
            $table->text('eligibility')->nullable();
            $table->string('education_level', 100)->nullable();

            // Application Information
            $table->date('application_start_date')->nullable();
            $table->date('application_deadline')->nullable();
            $table->string('application_url')->nullable();
            $table->string('official_website')->nullable();

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

            // Indexes
            $table->index('scholarship_name');
            $table->index('scholarship_type');
            $table->index('verification_status');
            $table->index('application_deadline');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
