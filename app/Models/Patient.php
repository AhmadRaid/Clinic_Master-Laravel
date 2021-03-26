<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################

    public function booking()
    {
        return $this->hasMany(Booking::class, 'id');
    }

    public function patientReports()
    {
        return $this->hasMany(PatientReports::class, 'id');
    }

##################################### End Relations #####################################

}
