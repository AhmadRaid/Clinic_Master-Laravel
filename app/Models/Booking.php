<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################

public function user()
{
    return $this->hasOne('App\Models\User' , 'id' , 'patient_id');
}


public function service()
{
    return $this->hasOne('App\Models\Service' , 'id' , 'service_id');
}


   
##################################### End Relations #####################################

}
