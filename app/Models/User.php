<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status', 'email', 'password', 'roles_name'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

#################################### Begin Relations ####################################

    public function patientsDetails()
    {
        return $this->belongsTo(PatientsDetails::class);
    }
    public function patients()
    {
        return $this->hasOne(PatientsDetails::class);
    }  

    public function patientsBody()
    {
        return $this->belongsTo(User::class);
    }


##################################### End Relations #####################################
}
