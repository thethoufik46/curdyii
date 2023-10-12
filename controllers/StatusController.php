<?php

namespace app\controllers;
use Yii;
use app\models\Status;


use app\components\AccessRule;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;



class StatusController extends Controller
{
    /**
     * {@inheritdoc}
     */


     
  
    /**
     * {@inheritdoc}
     */
    public function actionCreate()
    {
        $model = new Status();
        if ($model->load(Yii::$app->request->post())) {
          $image = UploadedFile::getInstance($model, 'image');
           if (!is_null($image)) {
             $model->image_src_filename = $image->name;
             $ext = end((explode(".", $image->name)));
              // generate a unique file name to prevent duplicate filenames 
              $model->image_web_filename = Yii::$app->security->generateRandomString().".{$ext}";
              // the path to save file, you can set an uploadPath 
              // in Yii::$app->params (as used in example below) 
              Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/status/';
              $path = Yii::$app->params['uploadPath'] . $model->image_web_filename;
               $image->saveAs($path);
            }
            if ($model->save()) {             
                return $this->redirect(['view', 'id' => $model->id]);             
            }  else {
                var_dump ($model->getErrors()); die();
             }
              }
              return $this->render('create', [
                  'model' => $model,
              ]);     
    }
}