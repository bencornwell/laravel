<?php

namespace App\Http\Controllers;

use App\Organisation;
use App\Datatable\Datatable;
use Illuminate\Http\Request;
use Response;

class OrganisationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexModal()
    {
        $organisations = Organisation::all( );
        $table = Datatable::create( $organisations, [
            'columns' => ['id','name','organisation_type_id','country_id'],
            'column_labels' => ['ID', 'Name','Type','Country'],
            'closures' => ['organisation_type_id' => function($o){return $o->type()->name;} ],
            'actions' => [ 'return_id' => 'id'  ]
            ]);
        return view('organisation.modal', [ 'organisations' => $organisations, 'table' => $table ] );
    }

    public function show(Request $request, Organisation $organisation)
    {
        if($request->ajax()){
        }

            return Response::json($organisation);
        //return view( 'organisation.fetch' );
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
