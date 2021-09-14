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

    /**
     * @return mixed
     */
    public static function tagsCloud()
    {
        return (new static())->has('photos')->get();
    }
}
