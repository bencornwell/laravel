<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Grant extends Model
{
    protected $fillable = [
        'project_title', 
        'project_description', 
        'status_id', 
        'lead_organisation_id',
        'funding_round_id',
        'funding_agency_reference',
        'application_date',
        'funder_decision_date',
        'planned_start_date',
        'planned_end_date',
        'actual_end_date',
        'relinquished_date',
        'transferred_in_date',
        'transferred_in_organisation_id',
        'transferred_out_date',
        'transferred_out_organisation_id',
    ];
    protected $guarded = [
        'user_id',
	];
    protected $dates = [
        'application_date',
	'funder_decision_date',
        'planned_start_date',
        'planned_end_date',
        'actual_end_date',
        'relinquished_date',
        'transferred_in_date',
        'transferred_out_date',
    ];

    

    public static $rules = [
	'project_title' => 'required|max:65535',
        'project_description' => 'required|max:65535',
        'status_id' => 'required|integer|exists:statuses,id',
        'application_date' => 'required|date',
        'lead_organisation_id' => 'required',
        'funding_round_id' => 'required',
        'funding_agency_reference' => 'required',
	'transferred_in_date' => 'required_with:transferred_in_organisation_id',
	'transferred_in_organisation_id' => 'required_with:transferred_in_date',
	'transferred_out_date' => 'required_with:transferred_out_organisation_id',
	'transferred_out_organisation_id' => 'required_with:transferred_out_date',
	];
    
    public function setAttribute( $name, $value )
    {
	parent::setAttribute( $name, 
	    ( !in_array( $name, $this->dates ) || is_null( $value ) ) ? 
	    $value : Carbon::createFromFormat( 'd/m/Y', $value ) 
	);
    }
    public function getAttribute( $name )
    {
	$value = parent::getAttribute($name);
	return ( !in_array($name,$this->dates ) || is_null($value ) )? 
		$value : 
		Carbon::parse($value)->format('d/m/Y');
    }
    public function status( )
    {
        return $this->belongsTo('App\Status');
    }
    public function user( )
    {
        return $this->belongsTo( 'App\User' );
    }
    public function leadOrganisation( )
    {
        return $this->belongsTo( 'App\Organisation' );
    }
    public function transferredFromOrganisation( )
    {
        return $this->belongsTo( 'App\Organisation','transferred_in_organisation_id','id' );
    }
    public function transferredToOrganisation( )
    {
        return $this->belongsTo( 'App\Organisation', 'transferred_out_organisation_id','id' );
    }
    public function fundingRound( )
    {
        return $this->belongsTo( 'App\FundingRound' );
    }
    public function fundingScheme( )
    {
        return $this->fundingRound( )->first( )->fundingScheme( );
    }
    public function fundingAgency( )
    {
        return $this->fundingScheme( )->first( )->fundingAgency( );
    }
}
