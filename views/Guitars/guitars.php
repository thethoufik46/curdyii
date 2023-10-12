
<?php

use yii\widgets\ActiveForm;


/* @var $this yiiwebView */
/* @var $model appmodelsGuitars */
/* @var $form ActiveForm */
?>
<div class="guitars">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'brand') ?>
        <?= $form->field($model, 'model') ?>
    
        <div class="form-group">
            <?= yii\helpers\Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- guitars -->