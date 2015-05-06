<?php

namespace App\Components;

class ImageProcessor
{
    public $image;
    public $newimage;
    public $imagepath;

    public function __construct($imagepath)
    {
        $this->imagepath = \T4\Fs\Helpers::getRealPath($imagepath);
        $imageinfo = getimagesize($this->imagepath);
        $imagetype = $imageinfo[2];
        if ($imagetype == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($this->imagepath);
        } elseif ($imagetype == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($this->imagepath);
        } elseif ($imagetype == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($this->imagepath);
        }
    }

    public function filterResize($width, $height)
    {
        $this->newimage = imagecreatetruecolor($width, $height);
        imagecopyresampled($this->newimage, $this->image, 0, 0, 0, 0, $width, $height,
                            $this->getWidth(), $this->getHeight());
    }

    public function filterResizeToHeight($height)
    {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->filterResize($width,$height);
    }
    public function filterResizeToWidth($width)
    {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->filterResize($width,$height);
    }
    public function filterZoom($zoom)
    {
        $width = $this->getWidth() * $zoom/100;
        $height = $this->getheight() * $zoom/100;
        $this->filterResize($width,$height);
    }

    public function getWidth()
    {
        return imagesx($this->image);
    }

    public function getHeight()
    {
        return imagesy($this->image);
    }

    public function save($imagetype = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
        if ($imagetype == IMAGETYPE_JPEG) {
            imagejpeg($this->newimage, $this->imagepath, $compression);
        } elseif ($imagetype == IMAGETYPE_GIF) {
            imagegif($this->newimage, $this->imagepath);
        } elseif ($imagetype == IMAGETYPE_PNG) {
            imagepng($this->newimage, $this->imagepath);
        }
        if ($permissions != null) {
            chmod($this->imagepath, $permissions);
        }
    }

} 