<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientReports extends Model
{
    protected $table = 'patient_reports';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id');
    }

##################################### End Relations #####################################

}
