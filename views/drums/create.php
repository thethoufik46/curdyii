<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Drums $model */

$this->title = 'Create Drums';
$this->params['breadcrumbs'][] = ['label' => 'Drums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drums-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
