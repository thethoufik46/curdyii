<?php

namespace app\models;

use Yii;

use yii\base\Model;


/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()

   {
      return [
            [['name', 'email', 'message'], 'required'],
            [['name', 'email', 'message'], 'string', 'max' => 255],
        ];
   }
   
}