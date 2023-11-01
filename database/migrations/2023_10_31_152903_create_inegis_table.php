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
        Schema::create('inegis', function (Blueprint $table) {
            $table->id();
            $table->integer('cvegeo');
            $table->integer('cve_agee');
            $table->string('nom_agee');
            $table->string('nom_abrev');
            $table->integer('pob');
            $table->integer('pob_fem');
            $table->integer('pob_mas');
            $table->integer('viv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inegis');
    }
};
