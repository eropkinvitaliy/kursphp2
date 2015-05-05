<?php

namespace App\Components;

class ImageProcessor
{

    public function __construct($imagepath)
    {
        $this->imagepath = $imagepath;
    }

    public function filterResize($width, $height)
    {
        $newimage = imagecreatetruecolor($width, $height);
        $image = self::loadImage();
        imagecopyresampled($newimage, $image, 0, 0, 0, 0, $width, $height, self::getWidth($image),self::getHeight($image));
        return $newimage;
    }

    private function loadImage()
    {
            $imageinfo = getimagesize($this->imagepath);
            $imagetype = $imageinfo[2];
            if ($imagetype == IMAGETYPE_JPEG) {
                $image = imagecreatefromjpeg($this->imagepath);
            } elseif ($imagetype == IMAGETYPE_GIF) {
                $image = imagecreatefromgif($this->imagepath);
            } elseif ($imagetype == IMAGETYPE_PNG) {
                $image = imagecreatefrompng($this->imagepath);
            } else {
                echo 'File should be:  .jpg  or .png or .gif';  // тут надо будет кинуть исключение, если это не проверяется ранее
                return false;
                }
        return $image;
    }

    static private function getWidth($image)
    {
        return imagesx($image);
    }

    static private function getHeight($image)
    {
        return imagesy($image);
    }

    public function save($image, $imagetype = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
            if ($imagetype == IMAGETYPE_JPEG) {
                imagejpeg($image, $this->imagepath, $compression);
            } elseif ($imagetype == IMAGETYPE_GIF) {
                imagegif($image, $this->imagepath);
            } elseif ($imagetype == IMAGETYPE_PNG) {
                imagepng($image, $this->imagepath);
            }
            if ($permissions != null) {
                chmod($this->imagepath, $permissions);
            }
    }

} 