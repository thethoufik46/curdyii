<?php

namespace app\controllers;


use app\models\City;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use yii\filters\VerbFilter;


class TestController extends Controller
{
public function actionDrop(){
    $model = new City();
     
    if($model->load(Yii::$app->request->post())){
        echo "<pre>";
        print_r($model);
        echo "</pre>";
        die();
    }
     
    return $this->render('drop',[
            'model'=>$model,
        ]);
    }

    public function actionCountryList($id){
        $count = City::find()
                        ->where(['country_id'=>$id,])
                        ->count();
     
        $cities = City::find()
                        ->where(['country_id'=>$id])
                        ->orderBy('id DESC')
                        ->all();
        
        if($count > 0){
            foreach($cities as $city){
                echo "<option value='".$city->id."'>".$city->cityName."</option>";
            }
        }else{
            echo "<option>-</option>";
        }
     
    }
}
    ?>