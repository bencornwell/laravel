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
        'funding_round_id',
        'funding_agency_reference',
        'application_date',
        'planned_start_date',
        'planned_end_date',
        'transferred_in_date',
        'transferred_out_date',
    ];
	protected $guarded = [
        'user_id',
	];
    protected $dates = [
        'application_date',
        'planned_start_date',
        'planned_end_date',
        'transferred_in_date',
        'transferred_out_date',
    ];

    public static $rules = [
		'project_title' => 'required|max:65535',
        'project_description' => 'required|max:65535',
        'status_id' => 'required|integer|exists:statuses,id',
        'application_date' => 'required|date',
	];

    public function getApplicationDateAttribute( )
    {
        return Carbon::parse($this->attributes["application_date"])->format('d/m/Y');
    }
    public function setApplicationDateAttribute( $value )
    {
        $this->attributes["application_date"] = Carbon::createFromFormat( 'd/m/Y', $value );
    }
    public function status( )
    {
        return $this->belongsTo('App\Status');
    }
    public function user( )
    {
        return $this->belongsTo( 'App\User' );
    }
}
