<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $guarded = [];
    public $timestamps = true;


#################################### Begin Relations ####################################

    public function services()
    {
        return $this->hasMany(Service::class, 'id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'id');
    }


##################################### End Relations #####################################

}
