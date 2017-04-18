<?php

namespace App\Models;

use App\Traits\CanCheckActiveTrait;
use App\Traits\CanCheckEmptyTrait;

use Illuminate\Database\Eloquent\Model;

class Site extends Model {

	use CanCheckActiveTrait;
	use CanCheckEmptyTrait;
	
	protected $fillable = [
		'domain',
		'base_path',
		'display_name',
		'theme',
	];

}