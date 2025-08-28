<?php
$this->breadcrumbs=array(
	'Music',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Music',
'subtitle'=>'Data Music',
);

$this->menu=array(
array('label'=>'Add Music', 'icon'=>'th-list','url'=>array('create')),
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
		<?php echo $this->renderPartial('_search', array('model'=>$model)); ?>
		<div class="wrapped datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

			<?php $this->widget('bootstrap.widgets.TbGridView',array(
			'id'=>'music-list-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
		// 'album_id',
		[
			'name' => 'album_id',
			'value' => '$data->album->title',
		],
		'names',
		// 'image',
		// 'contents',
		'duration',
		// 'created_at',
		[
			'name' => 'created_at',
			'value' => function($data) {
				return date('Y-m-d H:i', strtotime($data->created_at)) ?? 'N/A';
			},
		],
		/*
		'source_music',
		'image_lyric',
		'updated_at',
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