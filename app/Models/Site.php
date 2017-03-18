<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model {
	
	protected $fillable = [
		'domain',
		'base_path',
		'display_name',
	];

}