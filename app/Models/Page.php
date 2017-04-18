<?php

namespace App\Models;

use App\Traits\CanCheckActiveTrait;
use App\Traits\CanCheckEmptyTrait;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	use CanCheckActiveTrait;
	use CanCheckEmptyTrait;
	
	protected $fillable = [
		'site_id',
		'author_id',
		'path',
		'title',
		'content',
		'theme',
	];

}