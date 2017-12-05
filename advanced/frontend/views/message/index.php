<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form=ActiveForm::begin(['action'=>'?r=message/index']);?>
<table>
    <tr>
        <td>账号</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>密码</td>
        <td><input type="password" name="pwd"></td>
    </tr>
    <tr>

    </tr>
</table>
<?= Html::submitButton('登录',['class'=>'btn btn-primary'])?>
<?php $form->end();?>
