<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grant;
use App\Repositories\GrantRepository;
use App\Status;
use Carbon\Carbon;

class GrantController extends Controller
{
    protected $grants;
    public function __construct(GrantRepository $grants)
    {
        $this->middleware('auth');

        $this->grants = $grants;
    }

    public function index(Request $request )
    {
        $grants = ( $request->user()->isAdmin( ) ) ? Grant::all( ) : $this->grants->forUser($request->user( ));
        return view('grants.index', [
            'grants' => $grants
        ]);
    }

    public function create(Request $request )
    {
        $statuses = Status::pluck( 'status_name', 'id' );
        return view( 'grants.create', ['grant' => null, 'statuses' => $statuses ] );
    }
    
    public function store( Request $request )
    {
        $this->validate( $request, Grant::$rules );
        
        $grant = new Grant( );
        $grant->fill( $request->all( ) );
        $grant->funding_round_id = 1;
        $grant->funding_agency_reference = 1;
        $grant->user_id = $request->user( )->id;
        $grant->save( );

        return redirect( "/grant/edit/{$grant->id}" );

    }
    
    public function edit(Request $request, Grant $grant )
    {
        $statuses = Status::pluck( 'status_name', 'id' );
        return view( 'grants.create', ['grant' => $grant, 'statuses' => $statuses ] );
    }

    public function update( Request $request, Grant $grant )
    {
        $this->validate( $request, Grant::$rules );
        $grant->fill( $request->all( ) );
        $grant->save( );

        return redirect( "/grant/edit/{$grant->id}" );

    }

}
