<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\StatusAsset;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="status-form">
  <?php 
      $form = ActiveForm::begin([
          'options'=>['enctype'=>'multipart/form-data']]); // important 
           ?>    

<?=
        $form->field($model, 'permissions')->dropDownList($model->getPermissions(), 
                 ['prompt'=>Yii::t('app','- Choose Your Permissions -')]) ?>
               </div>
    </div>
    <div class="row">
      <?= $form->field($model, 'image')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*'],
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,],
          ]);   ?>
  </div>
    <div class="row">
                 
    <div class="form-group">
 <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
     </div>
   </div>