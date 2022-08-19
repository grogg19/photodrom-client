<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Intervention\Image\Facades\Image;

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

        $dir = config('photos.directoryOriginal');
        $year = date('Y');
        $month = strtolower(date('F'));

        $pathUrlToDb = DIRECTORY_SEPARATOR . $year . DIRECTORY_SEPARATOR . $month . DIRECTORY_SEPARATOR;

        $fullPath = $dir . $pathUrlToDb;
        $pathThumbnailSmall = $dir . $pathUrlToDb . 'thumbnails/small';
        $pathThumbnailBig = $dir . $pathUrlToDb . 'thumbnails/big';

        $pathOriginal = $fullPath . 'original';

        if (!is_dir($pathOriginal)) {
            if (!mkdir($pathOriginal, 0777, true) && !is_dir($pathOriginal)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathOriginal));
            }
        }

        if (!is_dir($pathThumbnailSmall)) {
            if (!mkdir($pathThumbnailSmall, 0777, true) && !is_dir($pathThumbnailSmall)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathThumbnailSmall));
            }
        }

        if (!is_dir($pathThumbnailBig)) {
            if (!mkdir($pathThumbnailBig, 0777, true) && !is_dir($pathThumbnailBig)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathThumbnailBig));
            }
        }

        $height = $this->faker->randomElement([800, 1200, 600]);
        $width = $this->faker->randomElement([800, 1200, 600]);

        // Другой фейкер, старый перестал создавать локально изображения
        $imgFaker = \Faker\Factory::create();
        $imgFaker->addProvider(new \Mmo\Faker\PicsumProvider($imgFaker));
        $imgFaker->addProvider(new \Mmo\Faker\LoremSpaceProvider($imgFaker));

        $image = $imgFaker->picsum($pathOriginal, $height, $width, true);

        copy($image, $pathThumbnailBig . DIRECTORY_SEPARATOR . basename($image));

        Image::make($pathOriginal . DIRECTORY_SEPARATOR . basename($image))
            ->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($pathThumbnailSmall . DIRECTORY_SEPARATOR . basename($image));

        return [
            'photo_name' => $this->faker->word(),
            'file_name' => basename($image),
            'date_exif' => $this->faker->dateTime(),
            'description' => $this->faker->realText(200),
            'exif_image_width' => $width,
            'exif_image_height' => $height,
            'file_size' => $this->faker->numberBetween(100000, 20000000),
            'url' => $pathUrlToDb . 'original' . DIRECTORY_SEPARATOR,
            'exif_content' => '{"ExposureProgram": 0, "FocalLength": [180, 10], "CustomRendered": 0, "YResolution": [300, 1], "MeteringMode": 5, "Make": "NIKON CORPORATION", "WhiteBalance": 0, "CompressedBitsPerPixel": [4, 1], "ExposureBiasValue": [0, 6], "XResolution": [300, 1], "ColorSpace": 1, "SubjectDistanceRange": 0, "SubsecTimeDigitized": "30", "DateTimeOriginal": "2010:09:12 15:52:24", "DigitalZoomRatio": [1, 1], "FocalLengthIn35mmFilm": 27, "ExposureMode": 0, "SceneCaptureType": 0, "Sharpness": 0, "ResolutionUnit": 2, "ExifOffset": 216, "SensingMethod": 2, "MaxApertureValue": [36, 10], "Model": "NIKON D80", "LightSource": 0, "Contrast": 0, "Saturation": 0, "YCbCrPositioning": 2, "Software": "Ver.1.00 ", "SubsecTime": "30", "ExifInteroperabilityOffset": 26512, "SubsecTimeOriginal": "30", "DateTimeDigitized": "2010:09:12 15:52:24", "ExifImageWidth": 3872, "Orientation": 1, "GainControl": 1, "Flash": 16, "DateTime": "2010:09:12 15:52:24", "ExposureTime": [10, 500], "ExifImageHeight": 2592, "FNumber": [35, 10], "ISOSpeedRatings": 800}'
        ];
    }
}
