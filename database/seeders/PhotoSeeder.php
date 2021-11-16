<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Tag;
use FilesystemIterator;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootDirectory = config('photos.directoryOriginal');

        if (is_dir($rootDirectory)) {
            (new Filesystem)->cleanDirectory($rootDirectory);
        }

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
