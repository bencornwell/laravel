<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    //
    public function leadGrants( )
    {
        return $this->hasMany(Grant::class);
    }

    public function fundingSchemes( )
    {
        return $this->hasMany( FundingScheme::class );
    }

    public function type( )
    {
        return $this->belongsTo( OrganisationType::class, 'organisation_type_id', 'id')->first( );
    }

}
