<?php

namespace App\Components;

class ImageProcessor
{
    public $image;
    public $newimage;
    public $pathToImage;
    public $widthLoadImage;
    public $heightLoadImage;

    public function __construct($pathToImage)
    {
        $this->pathToImage = \T4\Fs\Helpers::getRealPath($pathToImage);
        $imageinfo = getimagesize($this->pathToImage);
        $imagetype = $imageinfo[2];
        if ($imagetype == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($this->pathToImage);
        } elseif ($imagetype == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($this->pathToImage);
        } elseif ($imagetype == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($this->pathToImage);
        }
        $this->widthLoadImage = imagesx($this->image);
        $this->heightLoadImage = imagesy($this->image);
    }

    public function filterResize($width, $height)
    {
        $this->newimage = imagecreatetruecolor($width, $height);
        imagecopyresampled($this->newimage, $this->image, 0, 0, 0, 0, $width, $height,
            $this->widthLoadImage, $this->heightLoadImage);
    }

    public function filterResizeToHeight($height)
    {
        $ratio = $height / $this->heightLoadImage;
        $width = $this->widthLoadImage * $ratio;
        $this->filterResize($width,$height);
    }
    public function filterResizeToWidth($width)
    {
        $ratio = $width / $this->widthLoadImage;
        $height = $this->heightLoadImage * $ratio;
        $this->filterResize($width,$height);
    }
    public function filterZoom($zoom)
    {
        $width = $this->widthLoadImage * $zoom/100;
        $height = $this->heightLoadImage * $zoom/100;
        $this->filterResize($width,$height);
    }

     public function save($imagetype = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
        if ($imagetype == IMAGETYPE_JPEG) {
            imagejpeg($this->newimage, $this->pathToImage, $compression);
        } elseif ($imagetype == IMAGETYPE_GIF) {
            imagegif($this->newimage, $this->pathToImage);
        } elseif ($imagetype == IMAGETYPE_PNG) {
            imagepng($this->newimage, $this->pathToImage);
        }
        if ($permissions != null) {
            chmod($this->pathToImage, $permissions);
        }
    }
 /*   public function getWidth()
    {
        return imagesx($this->image);
    }

    public function getHeight()
    {
        return imagesy($this->image);
    }*/

} 