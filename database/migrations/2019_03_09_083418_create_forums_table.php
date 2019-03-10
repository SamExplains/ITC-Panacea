<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*
       *'user_id' => 'required',
        'fullname' => 'required',
        'age' => 'required',
        'gender' => 'required',
         severity used as 1 of 3 primary broad filters for the forum
        'condition' => 'required',
        'symptoms' => 'required|max:60',
        'medication_desc' => 'required',
        'medication_other' => 'required',
        'medication_other_mult' => 'required',
        'consent' => 'required'
        views -> number (count)
        likes -> number (count)
        helpful -> number (count)
        comments [ all user info like picture, name, photo, message ] -> references another table with the ForumID
        comment_likes ( count )
        comment evaluation score ( 1 ~ 3 )
        physician grade ( Red Yellow Green N/A )
        featured ( true / false )
       * */
        Schema::create('forums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('consent');
            $table->string('fullname');
            $table->integer('age');
            $table->string('gender');
            $table->string('severity');
            $table->string('condition', 500);
            $table->string('symptoms', 1500);
            $table->string('medication_desc', 2500);
            $table->string('medication_other', 2500);
            $table->string('medication_other_mult', 1500);
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('helpful')->default(0);
            $table->string('comments')->default(0);
            $table->string('comments_likes')->default(0);
            $table->string('evaluation_score')->default(0);
            $table->string('physician_grade')->default('N/A');
            $table->boolean('featured')->default(false);
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
        Schema::dropIfExists('forums');
    }
}
