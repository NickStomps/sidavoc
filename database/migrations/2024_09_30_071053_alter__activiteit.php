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
        Schema::table('activiteit', function (Blueprint $table) {
            // Make sure to use change() if the column already exists
            $table->string("naam_activiteit")->change();
            $table->text("Details_activiteit")->nullable()->change(); 
            $table->timestamp("Begin_activiteit")->change();
            $table->timestamp("Eind_activiteit")->change();
            $table->string("Locatie_activiteit")->change();
            $table->boolean("eten_inclusief")->change();
            $table->double("Kosten")->nullable()->change();
            $table->integer("maximaal_deelnemers")->change();
            $table->string("image_path")->nullable()->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activiteit', function (Blueprint $table) {
            // Reverse the changes made in the up() method
            $table->string("naam_activiteit")->change(); // Not nullable
            $table->text("Details_activiteit")->nullable(false)->change(); 
            $table->timestamp("Begin_activiteit")->change();
            $table->timestamp("Eind_activiteit")->change();
            $table->string("Locatie_activiteit")->change();
            $table->boolean("eten_inclusief")->change();
            $table->double("Kosten")->nullable(false)->change();
            $table->integer("maximaal_deelnemers")->change();
            $table->string("image_path")->nullable(false)->change(); 
        });
    }
};