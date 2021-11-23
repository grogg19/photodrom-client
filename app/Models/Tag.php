<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function photos()
    {
        return $this->morphedByMany(Photo::class, 'taggable');
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
