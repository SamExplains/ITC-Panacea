<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demographic extends Model
{
    //
  protected $fillable = ['user_id','age', 'firstname', 'lastname', 'gender', 'country', 'military_status', 'ethnicity', 'race'];
}
