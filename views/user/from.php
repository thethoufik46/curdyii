


<?php $form = \yii\widgets\ActiveForm::begin();

   //Initialize predefined categories
   $data = [
      '1' => 'Business Development(Sales)',
      '2' => 'Graphic Design',
      '3' => 'Social Media Marketing',
      '4' => 'Web Development',
   ]; 
?>

<?= $form->field($model, 'primaryfield')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Enter your primary field'],
        'pluginOptions' => [
            //'allowClear' => true
        ],
        'pluginEvents' => [
            "change" => "function() { 
                var id = $(this).val(); //extract the id of selected category   

                $.ajax({
                    method : 'GET',
                    dataType : 'text',
                    url : '../Usercontroller/populate?id=' + id,
                    success : function (response) {
                        var response = JSON.parse(response);
                        var myDropDownList = document.getElementById(\"model-item\");
                        $.each(response, function(index, value) {
                            var option = document.createElement(\"option\");
                                option.text = value;
                                option.value = index;

                               try {
                                    myDropDownList.options.add(option);
                                }
                                catch (e) {
                                    alert(e);
                                }
                        });
                    }
                });
            }",
        ],
    ]); 
?>
<?= $form->field($model,'item')->dropdownList(
        ['prompt'=>'Select Item']
    );
?>




?>







<?php $form = ActiveForm::begin(); 
   //Initialize predefined categories
   $data = [
      '1' => 'Business Development(Sales)',
      '2' => 'Graphic Design',
      '3' => 'Social Media Marketing',
      '4' => 'Web Development',
   ]; 
?>