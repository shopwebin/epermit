<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tradelist_models', function (Blueprint $table) {
            $table->id();
            $table->string('seller_name');
            $table->integer('state_id');
            $table->integer('district_id');
            $table->integer('mandal_id');
            $table->integer('commodity_id');
            $table->integer('quantity_id');
            $table->integer('weight');
            $table->integer('trade_value');
            $table->integer('m_fee');
            $table->tinyInteger('p_status');
            $table->tinyInteger('trade_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tradelist_models');
    }
};
