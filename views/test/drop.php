<?php 
	use common\models\City;
	use common\models\Country;
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\helpers\ArrayHelper;
 
	$countries = ArrayHelper::map(\app\models\Country::find()->asArray()->all(), 'id', 'countryName');
	$cities = ArrayHelper::map(\app\models\City::find()->asArray()->all(), 'id', 'cityName');
 
?>
<h1>Import Data</h1>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>
 
<?= $form->field($model,'country_id')->dropDownList(
	$countries,
	['prompt'=>'Select a Country',
	'onchange'=>'
	$.post("index.php?r=test/country-list&id="+$(this).val(), function( data ) {
	$( "select#city" ).html( data );
	});
	']);?>
 
<?php echo $form->field($model, 'cityName')
->dropDownList(
$cities,
['prompt'=>'','id'=>'city']
);?>
 
<?= Html::submitButton('Import',['class'=>'btn btn-primary']);?>
 
<?php ActiveForm::end();?>