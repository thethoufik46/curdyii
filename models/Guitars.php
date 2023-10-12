<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guitars".
 *
 * @property int $id
 * @property string|null $brand
 * @property string|null $model
 */
class Guitars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guitars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand', 'model'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Brand',
            'model' => 'Model',
        ];
    }
}
