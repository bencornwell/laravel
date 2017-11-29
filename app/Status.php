<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    public function grants( )
    {
        return $this->hasMany( 'App\Grant');
    }
}
