<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->string('title_bn')->nullable()->after('title');
            $table->text('caption_bn')->nullable()->after('caption');
        });

        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->string('title_bn')->nullable()->after('title');
            $table->text('description_bn')->nullable()->after('description');
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('title_bn')->nullable()->after('title');
            $table->text('short_description_bn')->nullable()->after('short_description');
            $table->longText('description_bn')->nullable()->after('description');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('title_bn')->nullable()->after('title');
            $table->text('summary_bn')->nullable()->after('summary');
            $table->longText('content_bn')->nullable()->after('content');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_bn')->nullable()->after('title');
            $table->text('summary_bn')->nullable()->after('summary');
            $table->longText('description_bn')->nullable()->after('description');
            $table->string('location_bn')->nullable()->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropColumn(['title_bn', 'caption_bn']);
        });

        Schema::table('gallery_albums', function (Blueprint $table) {
            $table->dropColumn(['title_bn', 'description_bn']);
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn(['title_bn', 'short_description_bn', 'description_bn']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['title_bn', 'summary_bn', 'content_bn']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title_bn', 'summary_bn', 'description_bn', 'location_bn']);
        });
    }
};
