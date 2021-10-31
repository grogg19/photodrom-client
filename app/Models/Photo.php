<?php

namespace App\Models;

use App\Models\Interfaces\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model implements HasTags
{
    use HasFactory;

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    protected $casts = [
        'exif_content' => 'array',
        'date_exif' => 'datetime:d.m.Y H:i'
    ];
}
