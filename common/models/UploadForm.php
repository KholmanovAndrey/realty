<?php

namespace common\models;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function upload($path)
    {
        if ($this->validate()) {
            $fullPath = '../../uploads/' . $path . '/';
            FileHelper::createDirectory($fullPath);

            $filesString = '';
            foreach ($this->imageFiles as $file) {
                $name = $file->baseName . '.' . $file->extension;
                $file->saveAs($fullPath . $name);
                $filesString .= $name . '|';
            }
            return $filesString;
        } else {
            return false;
        }
    }
}