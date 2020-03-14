<?php

namespace Ecoflow\Media;

use Illuminate\Support\Facades\File;

use Intervention\Image\Facades\Image as Intervention;

class Image
{

    /**
     * Width of the image
     *
     * @var integer
     */
    public $width = 150;

    /**
     * Height of the image
     *
     * @var integer
     */
    public $height = 150;

    /**
     * Create an image and save in storage.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param String $path can be public or storage
     * @param String $destination folder to specify the resource destination
     * @return String $fullpath
     */
    public function create(\Illuminate\Http\UploadedFile $image, String $path, String $destination): string
    {
        $imagename = time() . '.' . $image->getClientOriginalExtension();

        if ($destination === "storage") {
            $destination = storage_path($destination);
        } else {
            $destination = public_path($destination);
        }

        $img = Intervention::make($image->getRealPath());

        // TODO: Find a good strategy for image width and height
        $img->resize(config('settings.image.width'), config('settings.image.height'), function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination . '/' . $imagename);

        $fullpath = $path . $imagename;

        return $fullpath;
    }

    static public function remove($path): void
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
