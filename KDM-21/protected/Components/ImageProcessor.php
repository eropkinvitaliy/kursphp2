<?php

namespace App\Components;

class ImageProcessor
{

    public function __construct($imagepath)
    {
        $this->imagepath = $imagepath;
    }

    static public function filterResize($imagepath,$width, $height)
    {
        $newimage = imagecreatetruecolor($width, $height);
        $image = self::loadImage($imagepath);
        imagecopyresampled($newimage, $image, 0, 0, 0, 0, $width, $height, self::getWidth($image),self::getHeight($image));
        return $newimage;
    }

    private function loadImage($imagepath)
    {
            $imageinfo = getimagesize($imagepath);
            $imagetype = $imageinfo[2];
            if ($imagetype == IMAGETYPE_JPEG) {
                $imageres = imagecreatefromjpeg($imagepath);
            } elseif ($imagetype == IMAGETYPE_GIF) {
                $imageres = imagecreatefromgif($imagepath);
            } elseif ($imagetype == IMAGETYPE_PNG) {
                $imageres = imagecreatefrompng($imagepath);
            } else {
                echo 'File should be:  .jpg  or .png or .gif';  // тут надо будет кинуть исключение, если это не проверяется ранее
                return false;
                }
        return $imageres;
    }

    static private function getWidth($image)
    {
        return imagesx($image);
    }

    static private function getHeight($image)
    {
        return imagesy($image);
    }

    static public function save($imagepath, $image, $imagetype = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
            if ($imagetype == IMAGETYPE_JPEG) {
                imagejpeg($image, $imagepath, $compression);
            } elseif ($imagetype == IMAGETYPE_GIF) {
                imagegif($image, $imagepath);
            } elseif ($imagetype == IMAGETYPE_PNG) {
                imagepng($image, $imagepath);
            }
            if ($permissions != null) {
                chmod($imagepath, $permissions);
            }
    }

} 