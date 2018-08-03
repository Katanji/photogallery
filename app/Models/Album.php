<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property int $order
 * @property string $name
 * @property int $description
 */
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
