<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int|null $id
 * @property string|null $countryName
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['countryName'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countryName' => 'Country Name',
        ];
    }
}
