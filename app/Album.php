<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'order', 'name', 'description', 'list', 'photo'
    ];
    
    public function photos()
	{
		return $this->hasMany(Photo::class);
    }
}
