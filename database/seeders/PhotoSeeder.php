<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory()->count(20)->create();

        Photo::factory()
            ->count(60)
            ->afterCreating(function (Photo $photo) use ($tags) {
                $photo->tags()->attach(
                    $tags
                        ->shuffle()
                        ->take(rand(1,4))
                        ->pluck('id')
                );
            })
            ->create()
        ;
    }
}
