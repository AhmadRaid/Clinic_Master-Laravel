<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foodsystem extends Model
{
    protected $table = 'foodsystems';
    protected $guarded=[];
    public $timestamps = true;


    public function department()
    {
        return $this->hasOne('App\Models\Department' , 'id' , 'department_id');
    }
}
