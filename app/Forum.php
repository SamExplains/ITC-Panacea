<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //

  public function trimmedConditionName(){
    return explode('º', $this->condition)[0];
  }

  public function incrementViewCount() {

  }

  public function returnColorCodedSeverity() {

    switch ($this->severity){
      case "mild":
        echo "<b class='bg-success font-weight-bold p-1'>mild</b>";
        break;
      case "moderate":
        echo "<b class='bg-warning font-weight-bold p-1'>moderate</b>";
        break;
      case "severe":
        echo "<b class='bg-danger font-weight-bold p-1 text-white'>severe</b>";
        break;
    }

  }

  public function returnGradeLabel() {

    switch (json_decode($this->gradeThisThread())){
      case 'RED':
        echo '<span class="ui label ml-2">RED <i class="ui icon circle red ml-2"></i></span>';
        break;
      case 'YELLOW':
        echo '<span class="ui label ml-2">YELLOW <i class="ui icon circle yellow ml-2"></i></span>';
        break;
      case 'GREEN':
        echo '<span class="ui label ml-2">GREEN <i class="ui icon circle green ml-2"></i></span>';
        break;
    }

  }

  public function gradeThisThread(){
    $evaluation_score = $this->evaluation_score;
    $max_evaluation_score = ($this->comments * 3);
    $min = $max_evaluation_score * .34;
    $max = $max_evaluation_score * .66;

    if ($evaluation_score > $max)
      return json_encode('GREEN');

    if ($evaluation_score <= $max && $evaluation_score > $min)
      return json_encode('YELLOW');

    if ($evaluation_score <= $min)
      return json_encode('RED');

  }

  public function returnPhysicianGradeLabelIfAvailable(){
/* <span class="ui label">RED <i class="ui icon circle red ml-2"></i></span> */
    switch ($this->physician_grade){
      case 'N/A':
        echo '<span class="ui label">N/A</span>';
        break;
      case 'RED':
        echo '<span class="ui label">RED <i class="ui icon circle red ml-2"></i></span>';
        break;
      case 'YELLOW':
        echo '<span class="ui label">YELLOW <i class="ui icon circle yellow ml-2"></i></span>';
        break;
      case 'GREEN':
        echo '<span class="ui label">GREEN <i class="ui icon circle green ml-2"></i></span>';
        break;
    }


  }

}
