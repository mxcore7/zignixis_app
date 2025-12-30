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
        Schema::create('odoo_modules', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // Translatable
            $table->string('icon');
            $table->json('description'); // Translatable
            $table->json('features')->nullable(); // Array of strings (or translatable?) Let's keep it simple json array for now.
            $table->string('link')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odoo_modules');
    }
};
