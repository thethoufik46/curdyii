<?php

namespace app\models;
use app\models\Country;
use app\models\State;
use app\models\City;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property int $pincode
 * @property int $country
 * @property int $state
 * @property int $city
 * @property User $user
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'address','country', 'state', 'city', 'pincode'], 'required'],
            [['user_id','country', 'state', 'city','pincode'], 'integer'],
            [['country',], 'safe'],
            [['state',], 'safe'],
            [['city',], 'safe'],
            [['address'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
   
                'id' => 'ID',
                'user_id' => 'User ID',
                'address' => 'Address',
                'pincode' => 'Pincode',
                'country' => 'Country',
                'state' => 'State',
                'city' => 'City',
                'image' => 'Image',
      
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public static function getCountryList()
    { 

        return ArrayHelper::map(Country::find()->asArray()->all(), 'id', 'countryName');
 
    }
    public static function getStateList()
    { 

        return ArrayHelper::map(State::find()->asArray()->all(), 'country_id', 'name');
	          
    }

    public static function getCityList()
    { 

        return ArrayHelper::map(City::find()->asArray()->all(), 'state_id', 'name');
	          
    }
    /**
     * Summary of image
     * @var 
     */
    public $image;
    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }


}
