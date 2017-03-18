<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	
	protected $fillable = [
		'system_name',
		'display_name',
	];

}