<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################
public function department()
{
    return $this->hasOne('App\Models\Department' , 'id' , 'department_id');
}


public function doctor()
{
    return $this->hasOne('App\Models\Doctor' , 'id' , 'doctor_id');
}

   

##################################### End Relations #####################################
}
