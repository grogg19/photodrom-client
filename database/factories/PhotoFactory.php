<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo_name' => $this->faker->shuffleString(),
            'file_name' => $this->faker->imageUrl(),
            'date_exif' => $this->faker->dateTime(),
            'description' => $this->faker->realText(200),
            'exif_image_width' => $this->faker->randomElement([800, 1200, 600, 2400]),
            'exif_image_height' => $this->faker->randomElement([800, 1200, 600, 2400]),
            'file_size' => $this->faker->numberBetween(100000, 20000000),
            'url' => $this->faker->imageUrl(),
            'exif_content' => '{"ExposureProgram": 0, "FocalLength": [180, 10], "CustomRendered": 0, "YResolution": [300, 1], "MeteringMode": 5, "Make": "NIKON CORPORATION", "WhiteBalance": 0, "CompressedBitsPerPixel": [4, 1], "ExposureBiasValue": [0, 6], "XResolution": [300, 1], "ColorSpace": 1, "SubjectDistanceRange": 0, "SubsecTimeDigitized": "30", "DateTimeOriginal": "2010:09:12 15:52:24", "DigitalZoomRatio": [1, 1], "FocalLengthIn35mmFilm": 27, "ExposureMode": 0, "SceneCaptureType": 0, "Sharpness": 0, "ResolutionUnit": 2, "ExifOffset": 216, "SensingMethod": 2, "MaxApertureValue": [36, 10], "Model": "NIKON D80", "LightSource": 0, "Contrast": 0, "Saturation": 0, "YCbCrPositioning": 2, "Software": "Ver.1.00 ", "SubsecTime": "30", "ExifInteroperabilityOffset": 26512, "SubsecTimeOriginal": "30", "DateTimeDigitized": "2010:09:12 15:52:24", "ExifImageWidth": 3872, "Orientation": 1, "GainControl": 1, "Flash": 16, "DateTime": "2010:09:12 15:52:24", "ExposureTime": [10, 500], "ExifImageHeight": 2592, "FNumber": [35, 10], "ISOSpeedRatings": 800}'
        ];
    }
}
