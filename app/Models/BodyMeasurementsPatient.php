<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyMeasurementsPatient extends Model
{
    protected $table = 'bodyMeasurementsPatient';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################

    public function user()
    {
        return $this->belongsTo(User::class);
    }


##################################### End Relations #####################################

}
