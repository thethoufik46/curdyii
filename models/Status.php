<?php

namespace app\models;

use Yii;
/** 
* This is the model class for table "status". 
*
* @property integer $id 
* @property string $message 
* @property integer $permissions 
* @property string $image_src_filename 
* @property string $image_web_filename 
* @property integer $created_at 
* @property integer $updated_at 
* @property integer $created_by 
* 
* @property User $createdBy 
*/
class Status extends \yii\db\ActiveRecord
{
    const PERMISSIONS_PRIVATE = 10;
      const PERMISSIONS_PUBLIC = 20;  
      public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [        
            [['message'], 'required'],
            [['message'], 'string'],
            [['permissions', 'created_at', 'updated_at','created_by'], 'integer'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000'],
             [['image_src_filename', 'image_web_filename'], 'string', 'max' => 255],        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
          'id' => Yii::t('app', 'ID'),
          'message' => Yii::t('app', 'Message'),
          'permissions' => Yii::t('app', 'Permissions'),
          'image_src_filename' => Yii::t('app', 'Filename'),
          'image_web_filename' => Yii::t('app', 'Pathname'),          
          'created_by' => Yii::t('app', 'Created By'),
          'created_at' => Yii::t('app', 'Created At'),
          'updated_at' => Yii::t('app', 'Updated At'),        ];
    }
}
