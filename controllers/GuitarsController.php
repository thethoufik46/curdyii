<?php

namespace app\controllers;

use app\models\Guitars;
use Yii;
use yii\base\Controller;
use yiiwebController;
use appmodelsGuitars;

class GuitarsController extends Controller
{

	public function actionGuitars()
	{
		$model = new Guitars();
	
		// if the post data is set, the user submitted the form
		if ($model->load(Yii::$app->request->post())) {
			
			// in that case, validate the data
			if ($model->validate()) {
				
				// save it to the database
				$model->save();		
				return;
			}
		}
	
		// by default, diplay the form
		return $this->render('guitars', [
			'model' => $model,
		]);
	}
}