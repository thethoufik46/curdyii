<?php
   use yii\helpers\Html;
   use yii\helpers\HtmlPurifier;
?>
<div class = "user">
   <?= $model->id ?>
   <?= Html::encode($model->name) ?>
   <?= Html::encode($model->mobile) ?>
   <?= Html::encode($model->email) ?>
   <?= Html::encode($model->salary) ?>
   <?= Html::encode($modelUserProfile->address) ?>
   <?= Html::encode($modelUserProfile->pincode) ?> 
 
</div>