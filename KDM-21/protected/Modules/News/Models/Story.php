<?php

namespace App\Modules\News\Models;

use T4\Core\Collection;
use T4\Core\Exception;
use T4\Fs\Helpers;
use T4\Http\Uploader;
use T4\Mvc\Application;
use T4\Orm\Model;
use App\Components;

class Story
    extends Model
{
    static protected $schema = [
        'table' => 'newsstories',
        'columns' => [
            'title' => ['type' => 'string'],
            'published' => ['type' => 'datetime'],
            'lead' => ['type' => 'text'],
            'image' => ['type' => 'string', 'default' => ''],
            'text' => ['type' => 'text'],
        ],
        'relations' => [
            'topic' => ['type' => self::BELONGS_TO, 'model' => 'App\Modules\News\Models\Topic'],
            'files' => ['type' => self::HAS_MANY, 'model' => '\App\Modules\News\Models\File'],
        ]
    ];

    public function getShortLead($maxLength = 120)
    {
        if (mb_strlen($this->lead) > $maxLength) {
            $sourceStr = strip_tags($this->lead);
            $words = explode(' ', mb_substr($sourceStr, 0, $maxLength));
            array_pop($words);
            return implode(' ', $words);
        } else {
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
            $realUploadPath = \T4\Fs\Helpers::getRealPath($image);
            $imageresurs = \App\Components\ImageProcessor::filterResize($realUploadPath,150, 100);
            \App\Components\ImageProcessor::save($realUploadPath,$imageresurs);
//            $this->saveImage($_SERVER['DOCUMENT_ROOT'] . $this->image); //Сохраняю повторно в для своего хостинга
                                                                   // (для KDM44 не надо будет) т.к. Т4 (или Я)
                                                                    //  Helpers-ом не видит root-директорию /public_html
                                                                    // а видит её просто как public, без _html.
                                                                    //Скорее всего я что-то не понимаю, но пишу на всякий случай, вдруг это важно.
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
}