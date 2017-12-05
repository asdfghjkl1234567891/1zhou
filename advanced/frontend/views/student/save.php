<?php

	use yii\helpers\Html;	
	use yii\widgets\ActiveForm;
	


?>

<?php $form = ActiveForm::begin();?>

	<?= $form->field($model, 'username')?>
	<?= $form->field($model, 'sex')->radioList(['0'=>'女','1'=>'男']);?>
	<?= $form->field($model, 'age')->dropDownList([17=>17,18=>18,19=>19,20=>20],['prompt'=>'请选择']);?>
	<?= $form->field($model, 'hobby')->checkboxList(['one'=>'one','two'=>'two','three'=>'three']);?>

<div class="form-group">
	<?= Html::submitButton('Submit',['calss'=>'btn btn-primary'])?>
</div>
<?php $form->end();?>