<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFahpFuzzyWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fahp_fuzzy_weights', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->double('seg1', 8, 4);
            $table->double('seg2', 8, 4);
            $table->double('seg3', 8, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fahp_fuzzy_weights');
    }
}
