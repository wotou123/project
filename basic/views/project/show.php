<?php
use yii\widgets\LinkPager;
?>
	<div>
		【环球时报综合报道】 韩国总统朴槿惠正被其亲信崔顺实“干政门”丑闻引发的舆论海啸吞没。韩国民众29日和30日晚接连在首尔等地举行示威游行，要求其下台的呼声“一浪高过一浪”。面对民众的抗议浪潮和舆论的压力，朴槿惠30日接受其幕僚和秘书的集体辞职，试图缓和“亲信干政”丑闻的持续负面影响。丑闻女主角崔顺实当天回到韩国，表示会接受审查。但朴槿惠这种“丢卒保车”的做法并未取得各界的谅解。就连朴槿惠所在的执政党新国家党30日也举行紧急最高委员会议，要求朴槿惠成立“举国中立内阁”。
	</div>

	<?php echo $this->render('message'); ?>

	<div>
		<table class="table">
			<tr>
				<td>ID</td>
				<td>标题</td>
				<td>内容</td>
				<td>操作</td>
			</tr>
			<?php foreach ($data as $key => $val)
			{?>
			<tr>
				<td><?php echo $val['id']?></td>
				<td><?php echo $val['title']?></td>
				<td><?php echo $val['content']?></td>
				<td>
					<a href="?r=project/del&id=<?php echo $val['id']?>">删除</a>
					<a href="?r=project/up&id=<?php echo $val['id']?>" value="<?php echo $val['id']?>">修改</a>
				</td>
			</tr>
			<?php } ?>
		</table>
			<?php
				echo LinkPager::widget([
					'pagination' => $pages,
				]);
			?>
	</div>

	
		
