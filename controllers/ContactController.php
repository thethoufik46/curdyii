<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Contact;

class ContactController extends Controller
{
    /**
     * {@inheritdoc}
     */
 
    public function actionForms()
    {
        $model = new Contact();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->render('forms', [
                'model' => $model,
            ]);

        } else {
            return $this->render('forms', [
                'model' => $model,
            ]);
        }
    }

}
