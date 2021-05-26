<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "realty".
 *
 * @property int $id
 * @property int|null $address_id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int $photos
 * @property string $phones
 * @property string $contact
 * @property string $district
 * @property int $number_of_rooms
 * @property string $sleeping_places
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Address $address
 */
class Realty extends ActiveRecord
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realty';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_id', 'price', 'number_of_rooms', 'status', 'created_at', 'updated_at'], 'integer'],
            [['address_id', 'name', 'title', 'description', 'price', 'photos', 'phones', 'contact', 'district', 'number_of_rooms', 'sleeping_places'], 'required'],
            [['name', 'title', 'description', 'phones', 'contact', 'district', 'sleeping_places'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id']],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, PNG, JPG, JPEG', 'maxFiles' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address_id' => 'Адрес',
            'name' => 'Транслит',
            'title' => 'Наименование',
            'description' => 'Описание',
            'price' => 'Цена',
            'photos' => 'Фотографии',
            'phones' => 'Телефон',
            'contact' => 'Контактное лицо',
            'district' => 'Район',
            'number_of_rooms' => 'Кол-во комнат',
            'sleeping_places' => 'Спальные места',
            'status' => 'Статус',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'imageFiles' => 'Добавить фотографии'
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    /**
     * Загрузка картинок
     *
     * @param $id
     * @return bool
     */
    public function upload($id)
    {
        if ($this->validate()) {
            $fullPath = '../../uploads/realty/' . $id . '/';
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
