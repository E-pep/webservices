<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likestable extends Model
{
    public function owncode()
    {
    	 return $this->belongsTo(owncode::class);
    }
}
