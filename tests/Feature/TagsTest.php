<?php

namespace Tests\Feature;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class TagsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * Testing of registered user ability to create a tag
     *
     * @return void
     */
    public function testARegisteredUserCanCreateATag()
    {
        // Create user
        $this->actingAs(User::factory()->create());

        // Create photo
        $photo = Photo::factory()->create();

        // trying to add new tag to created photo
        $this->patch(route('photos.updateTagsInPhoto'), $attributes = [
            'photos' => [$photo->id],
            'tags' => [
                $tag = Str::ucfirst($this->faker->unique()->word())
            ]
        ]);

        $this->assertDatabaseHas('tags', ['name' => $tag]);
    }
}
