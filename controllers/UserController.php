<?php

namespace app\controllers;

use app\models\City;
use app\models\Country;
use app\models\Image;
use app\models\State;
use app\models\UploadImageForm;
use app\models\User;
use app\models\UserProfile;
use ArrayHelper;
use models\Cities;
use models\Countries;
use PhpParser\Node\Expr\Print_;
use Yii;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\debug\panels\UserPanel;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class UserController extends Controller
{
   /**
    * {@inheritdoc}
    */

   public function actionUser()
   {
      $model = new User();
      $modelUserProfile = new UserProfile();
      // $modelimage = new UploadImageForm();

      if (
         $model->load(Yii::$app->request->post()) &&
         $modelUserProfile->load(Yii::$app->request->post())
         //  &&  $modelimage->load (Yii::$app->request->post())
      ) {
         $model->save(false);
         $modelUserProfile->user_id = $model->id;
         $modelUserProfile->save(false);

         // $modelimage->image = UploadedFile::getInstance($modelimage, 'image');
         // $modelimage->upload();
         $this->redirect(['view']);
         return $this->render(
            'user',
            [
               'model' => $model,
               'modelUserProfile' => $modelUserProfile,
            ]
         );
      }
      if (true) {
         return $this->render(
            'user',
            [
               'model' => $model,
               'modelUserProfile' => $modelUserProfile,
            ]
         );
      } else {
         //  $this->redirect(['view']);
      }
   }
   /**
    * Summary of actionIndex
    * @return string
    */
   public function actionCreate()
   {
      $model = new User();

      $modelUserProfile = new UserProfile();



      if ($model->load(Yii::$app->request->post()) && $modelUserProfile->load(Yii::$app->request->post())) {
    $model->image = UploadedFile::getInstance($model, 'image');
         $model->save(false);
         $modelUserProfile->user_id = $model->id;
         $modelUserProfile->save(false);
        
         $this->redirect(['view']);
      } else {
         return $this->render(
            'user',
            [
               'model' => $model,
               'modelUserProfile' => $modelUserProfile,
   
            ]
         );
      }
   
}
   /**
    * Summary of actionView
    * @return string
    */

   public function actionView()
   { 

      $query = User::find()
         ->select(['*'])
  
         ->innerJoin('user_profile', 'user.id = user_profile.user_id')
         ->innerJoin('country', ' user_profile.country = country.id')
         ->innerJoin('state', ' user_profile.state = state.id')
         ->innerJoin('city', ' user_profile.city = city.id');
        
      
      $dataProvider = new ActiveDataProvider(['query' => $query,]);

      return $this->render('view', ['dataProvider' => $dataProvider,]);
   }

   public function actionCountry($country_id)
   {
      $result = State::find()
                           ->select(['id','name'])
                           ->where(['country_id' => $country_id])
                           ->asArray()
                           ->all();    
      return json_encode($result);
   }

   public function actionState($state_id)
   {
      $result = City::find()
                           ->select(['id','name'])
                           ->where(['state_id' => $state_id])
                           ->asArray()
                           ->all();
      return json_encode($result);
   }

   public function actionUpdate($id)
   {
      $model = User::find()->where(['id' => $id])->one();
      $modelUserProfile = UserProfile::find()->where(['User_id' => $id])->one();

      if ($this->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()) {
         if ($model->save(false) && $modelUserProfile->save()) {
            return $this->redirect(['view']);
         }
      } else {
         return $this->render(
            'user',
            [
               'model' => $model,
               'modelUserProfile' => $modelUserProfile,
            ]
         );
      }
   }

   public function actionDelete($id)
   {
      Yii::$app
               ->db
               ->createCommand()
               ->delete('user', ['id' => $id])
               ->execute();
      return $this->redirect(['view']);
   }





public function actionUploadImage() {
   $modelimage = new User();
   if (Yii::$app->request->isPost) {
      $modelimage->image = UploadedFile::getInstance($modelimage, 'image');
      if ($modelimage->upload()) {
         // file is uploaded successfully
         echo "File successfully uploaded";
         return;
      }
      else echo "hi";
   }
   return $this->render('upload', ['modelimage' => $modelimage]);
}
}






















// echo "<pre>"; print_r($query->attributes);die();