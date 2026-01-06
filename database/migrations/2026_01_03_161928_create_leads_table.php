<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('source')->default('website'); // website, referral, direct, etc.
            $table->string('status')->default('new'); // new, contacted, qualified, proposal, won, lost
            $table->text('notes')->nullable();
            $table->decimal('estimated_value', 10, 2)->nullable();
            $table->integer('probability')->default(10); // 0-100%
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('last_contacted_at')->nullable();
            $table->timestamp('qualified_at')->nullable();
            $table->timestamp('won_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
