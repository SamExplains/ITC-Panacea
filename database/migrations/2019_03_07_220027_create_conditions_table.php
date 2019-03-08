<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('common_name');
            $table->string('sex_filter');
            $table->string('prevalence');
            $table->string('acuteness');
            $table->string('severity');
            $table->string('triage_level');
            $table->string('categories');
            $table->string('extras_hint', 600);
            $table->string('extras_icd10_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conditions');
    }
}
