<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

  public function comments()
  {
//    return $this->hasMany(Comment::class)->whereNull('parent_id');
    return DB::table('comments')->where('forum_id', '=', 1)->get();
  }

}
