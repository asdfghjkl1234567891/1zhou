<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}

.top{ width: 100%; text-align: center;}
.top h2{ margin-top: 50px;}

form{ width: 450px; margin: 0 auto; margin-top: 50px;}
form input{
    width: 300px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding-left: 5px;
    font-size: 14px;
}

form p{
    margin-top: 20px;
    width: 100%;
}

form span{
    width: 100px;
    text-align: right;
    display: inline-block;
}

.check_label{
    width: 600px;
    margin: 0 auto;
    margin-top: 50px;
}

.check_label p{
    width: 550px;
    margin: 0 auto;
    margin-top: 30px;
}

.check_label .intrest_label a{
    padding: 5px;
    border: 1px solid rgba(0, 150, 0, 0.55);
    border-radius: 3px;
    white-space:nowrap;
    display: inline-block;
    margin-top: 10px;
    margin-left: 10px;
    color: #666;
}

.check_label .a_selected{
    background: rgba(0, 150, 0, 0.55);
    color: #fff;
}

.check_label .a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: inline-block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}

.handler-button{
    text-align: center;
}
</style>

<div class="top">
    <h2>欢迎注册</h2>
</div>


<div class="main">
    <div class="check_label">
        <h4>请选择您的兴趣标签</h4>
        <?php $form = ActiveForm::begin(['action'=>['zhu/show3'],'method'=>'post']); ?>
        <p class="intrest_label">
            <?php foreach($lick as $k=>$v):?>
            <a class='' href="javascript:;" value="<?= $v['lick']?>" name="lick[]"><?= $v['lick']?></a>
            <?php endforeach;?>
        </p>
        <p><input type="hidden" value="1" id='lack' name="lack"></p>
        <p class="handler-button">
            <a class="a_button" href="http://localhost/Small_one/advanced/frontend/web/index.php?r=zhu/show2">上一步</a>
            <?= Html::submitButton('完成', ['class' => 'btn btn-primary']) ?>
        </p>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$(document).on('click',"a[name='lick[]']",function(){         
			$(this).attr('class',"a_selected");
			$(this).siblings('a').removeAttr('class');
			var zhi = $(this).html();
		    $("#lack").val(zhi)
	})
</script>
