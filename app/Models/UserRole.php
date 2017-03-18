<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {
	
	protected $fillable = [
		'user_id',
		'site_id',
		'role',
	];

}