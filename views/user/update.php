

<p>
    <?= yii\helpers\Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?php
   use yii\grid\GridView;
   echo GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
         ['class' => 'yii\grid\SerialColumn'], 'name','mobile','email','dob','salary','address','pincode','country','state','city',
         ['class' => 'yii\grid\ActionColumn', 'template'=>'{update}{delete}',], 
         
      ],
      
   ]);
?>