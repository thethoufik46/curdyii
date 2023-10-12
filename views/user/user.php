<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserProfile;
?>

<div class="row">
           <div class="col-lg-5">
               <?php $form = ActiveForm::begin(['id' => 'user-form']); ?>

                   <?= $form->field($model, 'name') ?>
                   <?= $form->field($model, 'mobile') ?>
                   <?= $form->field($model, 'email')?>
                   <?= $form->field($model, 'salary')?>
                   <?= $form->field($modelUserProfile, 'address')?>
                   <?= $form->field($modelUserProfile, 'pincode')?>
                   <?= $form->field($modelUserProfile, 'country')->dropDownList(UserProfile::getCountryList()); ?>    
                   <?= $form->field($modelUserProfile, 'state')->dropDownList(['prompt'=>'']); ?>
                   <?= $form->field($modelUserProfile, 'city')->dropDownList(['prompt'=>'']); ?>

                   <?= $form->field($model, 'image')->fileInput() ?>
                  <div class="form-group">
                       <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'user-button']) ?>
                   </div>
               <?php ActiveForm::end(); ?>
           </div>
       </div>
       
       
 <script>
    
              $(document).ready(function() {
                $('#userprofile-country').on('change', function() {
                        console.log(this.value)
                        
                        var country_id = this.value;
                        $.ajax({ 
                            url: "/user/country",
                            type: "GET",
                            data: {
                                country_id: country_id
                            },
                            cache: false,
                success:function(result)
                 {
                    $('#userprofile-state').empty();
                    console.log(result)
                    $.each(JSON.parse(result),function(view,data){
                    $('#userprofile-state').append('<option value="'+data['id']+'">'+data['name']+'</option>');
                });	        
		},
	});
});
$(document).ready(function() {
                $('#userprofile-state').on('change', function() {
                        console.log(this.value)
                        var state_id = this.value;
                        $.ajax({ 
                            url: "/user/state",
                            type: "GET",
                            data: {
                                state_id: state_id
                            },
                            cache: false,
                success:function(result)
                 {
                    console.log(result)
                    $('#userprofile-city').empty();
                    $.each(JSON.parse(result),function(view,data){
                   
                    $('#userprofile-city').append('<option value="'+data['id']+'">'+data['name']+'</option>');
                    console.log(result)
                });	        
		},
	});
});
              });
            });


</script>