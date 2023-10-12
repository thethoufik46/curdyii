<?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'createdBy.email',
            'message:ntext',
            'permissions',
            'image_web_filename',
            'image_src_filename',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    
    <?php
       if ($model->image_web_filename!='') {
         echo '<br /><p><img src="'.Yii::$app->homeUrl. '/uploads/status/'.$model->image_web_filename.'"></p>';
       }    
    ?>