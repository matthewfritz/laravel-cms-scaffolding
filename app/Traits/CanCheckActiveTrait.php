<?php

namespace App\Traits;

trait CanCheckActiveTrait
{
	/**
	 * Query scope to retrieve records where the row is marked as active.
	 *
	 * @param Builder $query The existing query
	 *
	 * @return Builder
	 */
	public function scopeActive($query) {
		return $query->where('active', 1);
	}
}