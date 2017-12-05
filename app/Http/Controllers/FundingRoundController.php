<?php

namespace App\Http\Controllers;

use App\FundingRound;
use Illuminate\Http\Request;
use App\Datatable\Datatable;

class FundingRoundController extends Controller
{
    public function indexModal( )
    {
        $rounds = FundingRound::all( );
        $table = Datatable::create( $rounds, [
            'columns' => ['id','name','funding_scheme_id'],
            'column_labels' => ['ID', 'Name','Type'],
            //'closures' => ['organisation_type_id' => function($o){return $o->type()->name;} ],

            'actions' => [ 'return_id' => 'id'  ]
        ]);
        return view('fundinground.modal', [ 'rounds' => $rounds, 'table' => $table ] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FundingRound  $fundingRound
     * @return \Illuminate\Http\Response
     */
    public function show(FundingRound $fundingRound)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FundingRound  $fundingRound
     * @return \Illuminate\Http\Response
     */
    public function edit(FundingRound $fundingRound)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FundingRound  $fundingRound
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundingRound $fundingRound)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FundingRound  $fundingRound
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundingRound $fundingRound)
    {
        //
    }
}
