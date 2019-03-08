<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalInformation extends Model
{
    //

  protected $fillable = ['user_id','fullname', 'dob', 'street', 'city', 'zip',
                         'home_phone', 'work_phone', 'emergency_contact_name',
                         'emergency_contact_phone', 'emergency_contact_relationship', 'health_insurance_name',
                         'health_insurance_phone', 'health_insurance_id_number', 'health_insurance_physician_name',
                         'health_insurance_physician_clinic', 'health_insurance_physician_clinic_phone', 'health_insurance_physician_phone'];
}
