<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('title', 255);
            $table->string('slug', 255)->unique();

            $table->enum('announcement_type', [
                'Admission',
                'Scholarship',
                'Event',
                'News',
                'General'
            ])->default('General');

            $table->text('summary')->nullable();
            $table->longText('content');

            $table->string('featured_image')->nullable();

            $table->timestamp('published_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            $table->enum('status', [
                'Draft',
                'Pending',
                'Published',
                'Archived',
                'Rejected'
            ])->default('Draft');

            $table->boolean('is_featured')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->index(
                ['status', 'published_at'],
                'announcements_status_pub_idx'
            );

            $table->index('announcement_type');
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
