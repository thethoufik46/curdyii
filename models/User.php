<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use app\models\City;
use app\models\States;
use yii\base\Model;
use app\models\Country;
use app\models\State;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property int $salary
 * @property resource|null $image
 *
 * @property UserProfile[] $userProfiles
 */
class User extends \yii\db\ActiveRecord

{
    /**
     * {@inheritdoc}
     */

    public $address;
    public $pincode;
    public $country;
    public $state;
    public $city;

     
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'email', 'salary'], 'required'],
            [[ 'salary'], 'integer'],
            [['image'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['address' ,'country','state','city'], 'safe'],
            [['name', 'mobile', 'email'], 'string', 'max' => 20],
        ];
    }

    
    /**
     * Gets query for [[UserProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::class, ['user_id' => 'id']);
    }
}
