<?php
	
	use yii\widgets\LinkPager;
	use yii\helpers\Html;
	use yii\helpers\Url;



?>

	<a href="<?= Url::toRoute(['student/save']);?>">添加</a>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>名称</td>
			<td>性别</td>
			<td>年龄</td>
			<td>爱好</td>
			<td>操作</td>
		</tr>
		<?php foreach ($list as $val):?>
			<tr>
			<td><?= $val['id']?></td>
			<td><?= Html::encode($val['username'])?></td>
			<td><?= $val['sex'] == 1 ? '男' : '女'?></td>
			<td><?= Html::encode($val['age'])?></td>
			<td><?= Html::encode($val['hobby'])?></td>
			<td>
				<a href="<?= Url::toRoute(['student/delete','id' => $val['id']]);?>">删除</a>
				<a href="<?= Url::toRoute(['student/save','id' => $val['id']]);?>">修改</a>
			</td>
			</tr>
		<?php endforeach;?>
	</table>
	<?= LinkPager::widget(['pagination' => $pagination])?>