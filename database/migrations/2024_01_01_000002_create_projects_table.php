<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('sector')->nullable();
            $table->json('description');
            $table->json('solution')->nullable();
            $table->json('results')->nullable();
            $table->text('testimonial')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('images')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
