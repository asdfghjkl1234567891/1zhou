<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin();?>

	<?= $form->field($model,'name')?>
	<?= $form->field($model,'lm')?>

	<div class='form-group' style="text-align:right";>
		<input type="submit" value="添加留言">
	</div>
<?php $form->end();?>

<br>
<hr>