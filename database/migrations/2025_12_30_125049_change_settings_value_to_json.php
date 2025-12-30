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
        Schema::table('settings', function (Blueprint $table) {
             // We can't easily change text to json in some DBs without dropping data, but here we can try modify.
             // Or safer: drop column add column? No, we want to preserve if there was any (there isn't really).
             // Since it's clean install essentially:
             $table->json('value')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
             $table->text('value')->change();
        });
    }
};
