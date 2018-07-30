<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'album_id', 'order', 'name', 'file'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
