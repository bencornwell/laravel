<?php

namespace App\Repositories;

use App\User;
use App\Grant;

class GrantRepository 
{
	public function forUser( User $user )
	{
		return Grant::where('user_id', $user->id )->orderBy( 'created_at', 'asc' )->get( );
	}
	
}
