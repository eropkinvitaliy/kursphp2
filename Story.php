<?php

namespace App\Modules\News\Models;

use T4\Core\Collection;
use T4\Core\Exception;
use T4\Fs\Helpers;
use T4\Http\Uploader;
use T4\Mvc\Application;
use T4\Orm\Model;

class Story
    extends Model
{
    static protected $schema = [
        'table' => 'newsstories',
        'columns' => [
            'title' => ['type'=>'string'],
            'published' => ['type'=>'datetime'],
            'lead' => ['type'=>'text'],
            'image' => ['type'=>'string', 'default'=>''],
            'text' => ['type'=>'text'],
        ],
        'relations' => [
            'topic' => ['type'=>self::BELONGS_TO, 'model'=>'App\Modules\News\Models\Topic'],
            'files' => ['type' => self::HAS_MANY, 'model' => '\App\Modules\News\Models\File'],
        ]
    ];

    public function getShortLead($maxLength=120)
    {
        if ( mb_strlen( $this->lead) > $maxLength)
        {
            $sourceStr=strip_tags($this->lead);
            $words=explode(' ',mb_substr( $sourceStr,0,$maxLength));
            array_pop($words);
            return implode(' ',$words);
        }
        else
        {
            return $this->lead;
        }
    }

    public function uploadImage($formFieldName)
    {
        $request = Application::getInstance()->request;
        if (!$request->existsFilesData() || !$request->isUploaded($formFieldName) || $request->isUploadedArray($formFieldName))
            return $this;

        try {
            $uploader = new Uploader($formFieldName);
            $uploader->setPath('/public/news/stories/images');
            $image = $uploader();
            if ($this->image) {
                $this->deleteImage();
            }
            $this->image = $image;

            $realUploadPath = \T4\Fs\Helpers::getRealPath($image);  // Вот тут попытка изменения размера картинки
            $this->loadImage($realUploadPath);                      // Внизу 5 методов
//            unlink($realUploadPath);
            $this->resizeImage(120,100);
            $this->saveImage($realUploadPath);

        } catch (Exception $e) {
            $this->image = null;
        }
        return $this;
    }

    public function uploadFiles($formFieldName)
    {
        $request = Application::getInstance()->request;
        if (!$request->existsFilesData() || !$request->isUploadedArray($formFieldName))
            return $this;

        $uploader = new Uploader($formFieldName);
        $uploader->setPath('/public/news/stories/files');
        foreach ($uploader() as $uploadedFilePath) {
            if (false !== $uploadedFilePath)
                $this->files->append(new File(['file' => $uploadedFilePath]));
        }
        return $this;
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        $this->deleteFiles();
        return parent::beforeDelete();
    }

    public function deleteImage()
    {
        if ($this->image) {
            try {
                $this->image = '';
                Helpers::removeFile(ROOT_PATH_PUBLIC . $this->image);
            } catch (\T4\Fs\Exception $e) {
                return false;
            }
        }
        return true;
    }

    public function deleteFiles()
    {
        if (!empty($this->files)) {
            try {
                $this->files = new Collection();
                foreach ($this->files as $file) {
                    Helpers::removeFile(ROOT_PATH_PUBLIC . $file->file);
                }
            } catch (\T4\Fs\Exception $e) {
                return false;
            }
        }
        return true;
    }

    function loadImage($filename) {
        $imageinfo = getimagesize($filename);
        $this->imagetype = $imageinfo[2];
        if( $this->imagetype == IMAGETYPE_JPEG ) {
            $this->imageres = imagecreatefromjpeg($filename);
        } elseif( $this->imagetype == IMAGETYPE_GIF ) {
            $this->imageres = imagecreatefromgif($filename);
        } elseif( $this->imagetype == IMAGETYPE_PNG ) {
            $this->imageres = imagecreatefrompng($filename);
        }
    }

    function getWidth()
    {
        return imagesx($this->imageres);
    }

    function getHeight()
    {
        return imagesy($this->imageres);
    }

    function resizeImage($width,$height)
    {
        $newimage = imagecreatetruecolor($width, $height);
        imagecopyresampled($newimage, $this->imageres, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->imageres = $newimage;
    }

    function saveImage($filename, $imagetype=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
        if( $imagetype == IMAGETYPE_JPEG ) {
            imagejpeg($this->imageres,$filename,$compression);
        } elseif( $imagetype == IMAGETYPE_GIF ) {
            imagegif($this->imageres,$filename);
        } elseif( $imagetype == IMAGETYPE_PNG ) {
            imagepng($this->imageres,$filename);
        }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }
}