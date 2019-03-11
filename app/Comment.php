<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

  public function comments()
  {
    return DB::table('comments')->where('forum_id', '=', 1)->get();
  }

}
