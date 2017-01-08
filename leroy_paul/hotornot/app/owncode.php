<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class owncode extends Model
{
	public function likestable()
	{
		return $this->hasmany(likestable::class);
	}
}
