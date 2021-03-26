<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'doctor_service',
            'doctor_id',
            'service_id',
            'id',
            'id');
    }

##################################### End Relations #####################################

}
