<?= \yii\grid\GridView::widget([ 
'dataProvider' => $dataProvider, 
'filterModel' => $searchModel, 
'columns' => [ 
['class' => 'yii\grid\SerialColumn'], 
'id', 
'message:ntext', 
'permissions', 
'created_at', 
[ 
'attribute' => 'Image', 
'format' => 'raw', 
'value' => function ($model) { 
if ($model->image_web_filename!='') 
return '<img src="'.Yii::$app->homeUrl. '/uploads/status/'.$model->image_web_filename.'" width="50px" height="auto">'; else return 'no image'; 
}, 
], 
['class' => 'yii\grid\ActionColumn', 
'template'=>'{view} {update} {delete}', 
'buttons'=>[ 
'view' => function ($url, $model) { 
return \yii\helpers\Html::a('<span class="glyphicon glyphicon-eye-open"></span>', 'status/'.$model->slug, ['title' => Yii::t('yii', 'View'),]); 
} 
], 
], 
], 
]); ?>