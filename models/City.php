<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int|null $id
 * @property string|null $cityName
 * @property int|null $country_id
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'country_id'], 'integer'],
            [['cityName'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cityName' => 'City Name',
            'country_id' => 'Country ID',
        ];
    }
}
