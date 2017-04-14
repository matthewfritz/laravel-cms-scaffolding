<?php

namespace App\Traits;

trait CanCheckEmptyTrait
{
	/**
	 * Query scope to retrieve records where the given column is "empty".
	 *
	 * @param Builder $query The existing query
	 * @param string $column The name of the column to check
	 *
	 * @return Builder
	 */
	public function scopeWhereIsEmpty($query, $column) {
		return $query->where(function($q) use ($column) {
			$q->whereNull($column)
				->orWhere($column, "");
		});
	}
}