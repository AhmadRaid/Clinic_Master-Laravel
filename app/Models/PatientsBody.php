<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientsBody extends Model
{
    protected $table = 'patientsBody';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################

    public function user()
    {
        return $this->belongsTo(User::class);
    }


##################################### End Relations #####################################

}
