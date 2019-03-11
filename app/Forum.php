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

}
