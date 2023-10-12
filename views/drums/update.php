<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Drums $model */

$this->title = 'Update Drums: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Drums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drums-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
