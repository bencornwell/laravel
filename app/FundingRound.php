<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundingRound extends Model
{
    //
    public function fundingScheme( )
    {
        return $this->belongsTo( FundingScheme::class );
    }
    public function fundingAgency( )
    {
        return $this->fundingScheme( )->first( )->fundingAgency( );
    }

    public function grants( )
    {
        return $this->hasMany( Grant::class );
    }

    public function fullname( )
    {
        return sprintf( "%s / %s", $this->fundingScheme->name, $this->name );
    }
}
