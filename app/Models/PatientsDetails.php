<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientsDetails extends Model
{
    protected $table = 'patientsDetails';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################

    public function user()
    {
        return $this->belongsTo(User::class);
    }


##################################### End Relations #####################################

}
