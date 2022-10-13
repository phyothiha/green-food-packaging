<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialConsumerMarketingIssueLScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_consumer_marketing_issue_l_scales', function (Blueprint $table) {
            $table->id();
            $table->string('issue');
            $table->unsignedSmallInteger('scale');
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
        Schema::dropIfExists('material_consumer_marketing_issue_l_scales');
    }
}
