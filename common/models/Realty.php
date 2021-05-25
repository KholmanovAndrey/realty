<?php

namespace common\models;

use Yii;

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
class Realty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_id', 'price', 'number_of_rooms', 'status', 'created_at', 'updated_at'], 'integer'],
            [['address_id', 'name', 'title', 'description', 'price', 'photos', 'phones', 'contact', 'district', 'number_of_rooms', 'sleeping_places', 'created_at', 'updated_at'], 'required'],
            [['name', 'title', 'description', 'photos', 'phones', 'contact', 'district', 'sleeping_places'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'id']],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
}
