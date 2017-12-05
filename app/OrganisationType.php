<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganisationType extends Model
{
    public function organisations( )
    {
        return $this->hasMany(Organisation::class,'id', 'organisation_type_id');
    } 
}
