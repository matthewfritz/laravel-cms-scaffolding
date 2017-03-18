<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model {
	
	protected $fillable = [
		'page_id',
		'user_id',
		'old_value',
		'new_value',
	];

}