<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    //

  public function comments()
  {
    return DB::table('comments')->where('forum_id', '=', 1)->get();
  }

  public function totalComments() {

  }

  static function totalCommentsRated($id, $total_comments){
    $completed = DB::table('comments')->where('forum_id', '=', $id)->where('physician_evaluation_score', '>', 0)->count();

    if ($completed === 0)
      return 'No comments available!';

    $comments_evaluated = $total_comments - $completed;

    if ($comments_evaluated === 0)
      return 'All comments completed.';

    if ($comments_evaluated > 0)
      return 'Comments need evaluation.';

  }

}
