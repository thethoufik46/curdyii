<div class="row">
    <?php echo $form->labelEx($model,'country'); 
    $opts = CHtml::listData(Country::model()->findAll(),'countryid','cname');
    echo $form->dropDownList($model,'country_id',$opts,
        array(
                'prompt'=>'Select Country',
                'ajax' => array(
                'type'=>'POST', 
                'url'=>CController::createUrl('Sample/dynamicSubcategory'),
                'update'=>'#state_name',
                'data'=>array('country_id'=>'js:this.value'),
                 )));
    echo $form->error($model,'country_id'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model,'state_id');
    echo CHtml::dropDownList('state_name','', array(), array(
        'prompt'=>'Select State'

        ));
    echo $form->error($model,'state_id'); ?>
</div>