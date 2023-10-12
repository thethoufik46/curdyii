<?php

namespace app\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;

use yii\filters\VerbFilter;





class SampleController extends Controller
{
    /**
     * {@inheritdoc}
     */

  
     public function actiondynamicSubcategory()

     {
     
             $countryId=$_POST['coountry_id'];
     
             $criteria=new CDbCriteria();
     
             $criteria->select=array('state_id,state_name');
     
             $criteria->condition='country_cid='.$countryId;
     
             $criteria->order='state_name';
     
             $cityAry= State::model()->findAll($criteria);
     
             $ary=array();
     
             foreach($cityAry as $i=>$obj)
     
             {
     
                 $ary[$i]['state_id']=$obj->id;
     
                 $ary[$i]['state_name']=$obj->name;            
     
             }
     
             echo json_encode($ary);
     
     }
     
}
