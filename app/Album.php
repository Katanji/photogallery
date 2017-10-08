<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'name', 'description', 'list', 'photo'
    ];
    
    public function photo()
	{
		return $this->belongsTo(Album::class);
    }
}
