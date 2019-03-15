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
      return 'N/A';

    $comments_evaluated = $total_comments - $completed;

    /* Check if the post has a evaluation grade! */

    if ($comments_evaluated === 0) {
      return 'All comments scored.';
    }
//      echo '<button class="ui button green small">Final Evaluation</button>';

    if ($comments_evaluated > 0) {

      if (\Auth::user()->account === "physician")
        echo '<span class="bg-danger p-2 text-white">'. $comments_evaluated .'</span> Comments need scores before final evaluation. <img style="width: 2rem; height: 2rem" class="ui image fluid d-inline-block ml-2" src=' . asset("images/defaults/evaluate.svg") . ">";
      else
        echo 'Awaiting physician final evaluation!';

    }

  }

}
