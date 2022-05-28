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
    public function up()
    {
        Schema::create('permit', function (Blueprint $table) {
            $table->id();
            $table->text('ad1');
            $table->text('ad2');
            $table->integer('com_id');
            $table->integer('dis_id');
            $table->integer('state_id');
            $table->integer('mdl_id');
            $table->integer('a_weight');
            $table->string('q_details');
            $table->integer('source');
            $table->integer('destination');
            $table->timestamp('valid_from');
            $table->timestamp('valid_to');
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
        //
    }
};
