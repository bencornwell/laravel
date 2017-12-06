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
	];

    public function getTransferredOutDateAttribute( )
    {
        return $this->getDate($this->attributes["transferred_out_date"]);
    }
    public function setTransferredOutDateAttribute( $value )
    {
        $this->attributes["transferred_out_date"] = $this->setDate( $value );
    }
    public function getTransferredInDateAttribute( )
    {
        return $this->getDate($this->attributes["transferred_in_date"]);
    }
    public function setTransferredInDateAttribute( $value )
    {
        $this->attributes["transferred_in_date"] = $this->setDate( $value );
    }
    public function getRelinquishedDateAttribute( )
    {
        return $this->getDate($this->attributes["relinquished_date"]);
    }
    public function setRelinquishedDateAttribute( $value )
    {
        $this->attributes["relinquished_date"] = $this->setDate( $value );
    }
    public function getActualEndDateAttribute( )
    {
        return $this->getDate($this->attributes["actual_end_date"]);
    }
    public function setActualEndDateAttribute( $value )
    {
        $this->attributes["actual_end_date"] = $this->setDate( $value );
    }
    public function getPlannedEndDateAttribute( )
    {
        return $this->getDate($this->attributes["planned_end_date"]);
    }
    public function setPlannedEndDateAttribute( $value )
    {
        $this->attributes["planned_end_date"] = $this->setDate( $value );
    }
    public function getPlannedStartDateAttribute( )
    {
        return $this->getDate($this->attributes["planned_start_date"]);
    }
    public function setPlannedStartDateAttribute( $value )
    {
        $this->attributes["planned_start_date"] = $this->setDate( $value );
    }
    public function getFunderDecisionDateAttribute( )
    {
        return $this->getDate($this->attributes["funder_decision_date"]);
    }
    public function setFunderDecisionDateAttribute($value )
    {
        $this->attributes["funder_decision_date"] = $this->setDate( $value );
    }
    public function getApplicationDateAttribute( )
    {
        return $this->getDate($this->attributes["application_date"]);
    }
    public function setApplicationDateAttribute( $value )
    {
        $this->attributes["application_date"] = $this->setDate( $value );
    }
    private function setDate( $date )
    {
        return Carbon::createFromFormat( 'd/m/Y', $date );
    }
    private function getDate( $date )
    {
        return Carbon::parse($date)->format('d/m/Y');
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
