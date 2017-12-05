<?php 

	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
use DfaFilter\SensitiveHelper;

$wordData = array(
   	'窝草',
    '察象蚂',
    '拆迁灭',
    '车牌隐',
    '成人',
    '成人卡通',
);

?>
	<a href="<?= Url::toRoute(['message/save'])?>">添加</a>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>留言人</td>
			<td>留言内容</td>
			<td>操作</td>
		</tr>
		<?php foreach ($list as $val): ?>
		<tr>
			<td><?= $val['id']?></td>
			<td><?=$filterContent = SensitiveHelper::init()->setTree($wordData)->replace($val['name'], '***')?></td>
			<td><?=$filterContent = SensitiveHelper::init()->setTree($wordData)->replace($val['lm'], '***')?></td>
			<td>
				<a href="<?= Url::toRoute(['message/del','id' => $val['id']]);?>">删除</a>
				<a href="<?= Url::toRoute(['message/up','id' => $val['id']]);?>">修改</a>

			</td>
		</tr>
		<?php endforeach ?>

	</table>

	<?= LinkPager::widget(['pagination' => $pagination])?>