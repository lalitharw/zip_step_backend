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
            $table->double("heading")->nullable();
            $table->double("accuracy")->nullable();
            $table->timestamp("point_added")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_points', function (Blueprint $table) {
            $table->dropColumn(["heading","accuracy","point_added"]);
        });
    }
};
