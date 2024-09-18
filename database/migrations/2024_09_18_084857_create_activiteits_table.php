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
        Schema::create('activiteit', function (Blueprint $table) {
            $table->id();
            $table->string("naam_activiteit");
            $table->text("Details_activiteit");
            $table->timestamp("Begin_activiteit");
            $table->timestamp("Eind_activiteit");
            $table->string("Locatie_activiteit");
            $table->boolean("eten_inclusief");
            $table->double("Kosten");
            $table->integer("maximaal_deelnemers");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activiteit');
    }
};