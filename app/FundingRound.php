<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundingRound extends Model
{
    protected $appends = [ 'fullname', 'agencyname' ];
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

    public function getFullnameAttribute( )
    {
        return sprintf( "%s / %s", $this->fundingScheme->name, $this->name );
    }
    public function getAgencynameAttribute( )
    {
        return $this->fundingAgency( )->first( )->name;
    }
}
