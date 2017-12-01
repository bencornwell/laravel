<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundingScheme extends Model
{
    //
    public function fundingRound( )
    {
        return $this->hasMany( FundingRound::class );
    }
    public function fundingAgency( )
    {
        return $this->belongsTo( Organisation::class,  'agency_id', 'id' );
    }

}
