<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            
            // Step 1: Project Nature
            $table->string('project_type');
            $table->string('project_type_other')->nullable();
            
            // Step 2: Timeline
            $table->string('timeline_urgency');
            $table->string('start_date')->nullable();
            $table->boolean('is_date_fixed')->default(false);
            
            // Step 3: Budget
            $table->string('budget_range');
            $table->string('funding_mode')->nullable();
            
            // Step 4: Company Context
            $table->string('industry');
            $table->string('company_size');
            $table->string('country')->default('Cameroun');
            $table->string('city');
            $table->string('existing_system');
            $table->string('users_count')->nullable();
            
            // Step 5: Description
            $table->text('description');
            $table->text('references')->nullable();
            $table->text('priority_features')->nullable();
            $table->text('technical_constraints')->nullable();
            
            // Step 6: Contact & Engagement
            $table->string('contact_name');
            $table->string('company_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('job_title')->nullable();
            $table->string('discovery_source')->nullable();
            $table->boolean('serious_commitment')->default(true);
            
            // Meta
            $table->string('status')->default('new'); // new, in_progress, completed, rejected
            $table->text('admin_notes')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
