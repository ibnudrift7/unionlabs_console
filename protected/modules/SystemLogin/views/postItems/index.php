<?php
$this->breadcrumbs=array(
	'Post Items',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Post Items',
'subtitle'=>'Data Post Items',
);

$this->menu=array(
// array('label'=>'Add Post Items', 'icon'=>'th-list','url'=>array('create')),
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
			'id'=>'post-items-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
		// 'member_id',
		[
			'name' => 'member_id',
			'value' => '$data->member->first_name . " " . $data->member->last_name',
		],
		// 'title',
		[
			'name' => 'title',
			'value' => '$data->title',
		],
		'image',
		'slug',
		'content',
		'dates',
		/*
		'created_at',
		'updated_at',
		'deleted_at',
		'type_post_id',
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