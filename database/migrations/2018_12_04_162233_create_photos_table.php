<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('photo_name');
            $table->string('file_name');
            $table->dateTime('date_exif');
            $table->text('description');
            $table->integer('exif_image_width');
            $table->integer('exif_image_height');
            $table->integer('file_size');
            $table->string('url');
            $table->text('exif_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
