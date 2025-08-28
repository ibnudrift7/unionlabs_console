<?php
$this->breadcrumbs=array(
	'Post Comments',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Post Comments',
'subtitle'=>'Data Post Comments',
);

$this->menu=array(
// array('label'=>'Add Post Comments', 'icon'=>'th-list','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
'alerts'=>array('success'),
)); ?>

<?php endif; ?>

<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			<?=
$this->pageHeader['subtitle'] ?>
		</h5>
		<div class="wrapped datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

			<?php $this->widget('bootstrap.widgets.TbGridView',array(
			'id'=>'post-comments-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
		'post_id',
		// 'parent_comment_id',
		[
			'name' => 'post_id',
			'value' => '$data->post->title',
		],
		// 'member_id',
		[
			'name' => 'member_id',
			'value' => '$data->member->first_name . " " . $data->member->last_name',
		],
		'content',
		/*
		'created_at',
		'deleted_at',
		*/
			array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
			),
			),
			)); ?>

		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function($) {
		// $('.delete').deleteAjax({})
	})
</script>