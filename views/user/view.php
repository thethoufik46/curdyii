<?php
   use yii\grid\GridView;
   use yii\helpers\Html;
   use yii\helpers\Url;


?>

<p>
    <?= yii\helpers\Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    
</p>

<?php   echo GridView::widget([
      'dataProvider' => $dataProvider,

      
      
      'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          // Simple columns defined by the data contained in $dataProvider.
          // Data from the model's column will be used.
          'name',
  
          'mobile',
          'email',
          'salary',
          'address',
          'pincode',
          'country',
          'state',
          'city',
          'image',
          // More complex one.
        //   [
        //       'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
        //       'value' => function ($data) {
        //           return ; // $data['name'] for array data, e.g. using SqlDataProvider.
        //       },
        //   ],
         [
            'class' => 'yii\grid\ActionColumn',
            'template'=> '{update} {delete} ',
            
               
       ], 
      ],
  ]);

?>