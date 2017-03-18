<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
	
	protected $fillable = [
		'site_id',
		'author_id',
		'path',
		'title',
		'content'
	];

}