<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('fullname');
            $table->string('dob');
            $table->string('street');
            $table->string('city');
            $table->string('zip');
            $table->string('state');
            $table->string('home_phone');
            $table->string('work_phone');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');
            $table->string('emergency_contact_relationship');
            $table->string('health_insurance_name');
            $table->string('health_insurance_phone');
            $table->string('health_insurance_id_number');
            $table->string('health_insurance_physician_name');
            $table->string('health_insurance_physician_clinic');
            $table->string('health_insurance_physician_clinic_phone');
            $table->string('health_insurance_physician_phone');
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
        Schema::dropIfExists('medical_information');
    }
}
