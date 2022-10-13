<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialEnvironmentalImpactLScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_environmental_impact_l_scales', function (Blueprint $table) {
            $table->id();
            $table->string('impact');
            $table->unsignedTinyInteger('scale');
            $table->string('package_material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_environmental_impact_l_scales');
    }
}
