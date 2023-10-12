<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserProfile;
?>


<?php ActiveForm::end() ?> 
<div class="row">
           <div class="col-lg-5">
                   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
                   <?= $form->field($model, 'name') ?>
                   <?= $form->field($model, 'mobile') ?>
                   <?= $form->field($model, 'email')?>
                   <?= $form->field($model, 'salary')?>
                   <?= $form->field($modelUserProfile, 'address')?> 
                   <?= $form->field($modelUserProfile, 'pincode')?>
                   <div id="country-drop">
                   <?= $form->field($model, 'country')->dropDownList(UserProfile::getCountryList()); ?>
                   </div>
                   <div id="state-drop">
                   <?= $form->field($model, 'country')->dropDownList(UserProfile::getStateList()); ?>
                   </div>
                   
                   
                     
            </div>
                  <div class="form-group">
                       <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'user-button']) ?>
                   </div>
           
               <?php ActiveForm::end(); ?>
           </div>
       </div>

  <script>
    
              $(document).ready(function() {
                $('#user-country').on('change', function() {
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
                    $('#user-state').empty();
                    console.log(result)
                    $.each(JSON.parse(result),function(view,data){
                    $('#user-state').append('<option value="'+data['id']+'">'+data['name']+'</option>');
                });	        
		},
	});
});
$(document).ready(function() {
                $('#user-state').on('change', function() {
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
                    $('#user-city').empty();
                    $.each(JSON.parse(result),function(view,data){
                   
                    $('#user-city').append('<option value="'+data['id']+'">'+data['name']+'</option>');
                    console.log(result)
                });	        
		},
	});
});
              });
            });


</script>