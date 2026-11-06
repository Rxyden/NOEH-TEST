<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verification_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('institution_id')
                ->constrained('institutions')
                ->cascadeOnDelete();

            $table->foreignId('submitted_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('reviewed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('request_type', 100);
            $table->string('target_type', 100)->nullable();
            $table->unsignedBigInteger('target_id')->nullable();

            $table->string('title', 255);
            $table->longText('submitted_data');

            $table->text('review_notes')->nullable();

            $table->enum('status', [
                'Pending',
                'Approved',
                'Rejected',
                'Cancelled'
            ])->default('Pending');

            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();

            $table->index(
                ['institution_id', 'status'],
                'verification_inst_status_idx'
            );

            $table->index(
                ['submitted_by', 'status'],
                'verification_submit_status_idx'
            );

            $table->index(
                ['target_type', 'target_id'],
                'verification_target_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verification_requests');
    }
};
