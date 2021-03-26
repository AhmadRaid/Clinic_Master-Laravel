<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfectBody extends Model
{
    protected $table = 'perfectBody';
    protected $guarded = [];
    public $timestamps = true;

#################################### Begin Relations ####################################

    public function user()
    {
        return $this->belongsTo(User::class);
    }


##################################### End Relations #####################################

}
