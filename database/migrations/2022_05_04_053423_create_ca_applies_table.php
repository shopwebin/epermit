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
        Schema::create('ca_applies', function (Blueprint $table) {
            $table->id();
            $table->string('familymemberholdcafile');
            $table->string('upladedotherfirmfile');
            $table->string('aadhar_no',15);
            $table->string('name');
            $table->integer('age');
            $table->integer('isfamilymemberholdca');
            $table->integer('isotherfirm');
            $table->integer('state_id');
            $table->integer('district_id');
            $table->integer('user_id');
            $table->integer('liscencetype_id');
            $table->integer('amc_id');
            $table->tinyInteger('is_minor');
            $table->tinyInteger('is_reg_id');
            $table->tinyInteger('is_final_pay');
            $table->tinyInteger('is_submit');
            $table->tinyInteger('is_amc_approcal');
            $table->tinyInteger('is_ad_approval');
            $table->tinyInteger('is_commisioner_approval');
            $table->tinyInteger('is_sign_upload');
            $table->tinyInteger('traderlicense');
            $table->tinyInteger('is_commissioner_comply');
            $table->tinyInteger('is_amc_comply');
            $table->tinyInteger('is_ad_comply');
            $table->tinyInteger('status');
            $table->string('traderlicensefile');
            $table->string('pincode',8);
            $table->string('application_id');
            $table->string('signature_file');
            $table->string('aadhar_file');
            $table->string('pan_file');
            $table->string('fathersname');
            $table->string('mobile',15);
            $table->string('pan_no',20);
            $table->string('email');
            $table->text('address');
            $table->text('marketname');
            $table->text('gstin');
            $table->text('power_attorney');
            $table->text('user_temp_id');
            $table->text('reg_pay_desc');
            $table->text('final_pay_desc');
            $table->date('dob');
            $table->date('expiry_date');
            $table->datetime('updated_at');
            $table->datetime('created_at');
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
        Schema::dropIfExists('ca_applies');
    }
};
