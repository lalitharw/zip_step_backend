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
        Schema::table('activity_points', function (Blueprint $table) {
            $table->double("latitude")->change();
            $table->double("longitude")->change();
            $table->double("speed")->change();
            $table->double("altitude")->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_points', function (Blueprint $table) {
            $table->string("latitude")->change();
            $table->string("longitude")->change();
            $table->string("speed")->change();
            $table->string("altitude")->change();
        });
    }
};
