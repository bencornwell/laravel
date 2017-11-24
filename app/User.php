<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * defining relationship with Task 
     */
    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }

    public function roles( )
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin( ) {
        return null !== $this->roles()->where('name', 'administrator')->first();
    }
    public function is( \Illuminate\Database\Eloquent\Model $roleName )
    {
        foreach( $this->roles( )->get( ) as $role )
        {
            if( $role->name == $roleName )
            {
                return true;
            }
        }
        return false;
    }
}
