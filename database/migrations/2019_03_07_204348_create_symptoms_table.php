<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('common_name');
            $table->string('sex_filter');
            $table->string('category');
            $table->string('seriousness');
            $table->string('image_url')->nullable();
            $table->string('image_source')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('parent_relation')->nullable();
            $table->string('children_id')->nullable();
            $table->string('children_parent_relation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('symptoms');
    }
}
