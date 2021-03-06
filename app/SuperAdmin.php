<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
	use Notifiable;

	protected $guard = 'admin';

	protected $table = 'superadmins';
	
	protected $fillable = [
		'name', 'username', 'email', 'password'
	];
    
    protected $hidden = [
    	'password', 'remember_token',
    ];
}
