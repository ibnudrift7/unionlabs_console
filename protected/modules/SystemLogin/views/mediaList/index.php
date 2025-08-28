<?php
$this->breadcrumbs=array(
	'Media List',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Media/Album List',
'subtitle'=>'Data Media/Album',
);

$this->menu=array(
array('label'=>'Add Media', 'icon'=>'bi bi-plus','url'=>array('create')),
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
			'id'=>'media-list-items-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
		'title',
		// 'date_event',
		[
			'name'=>'date_event',
			'value'=>function($data){
				return ($data->date_event == '0000-00-00') ? '-' : date('d M Y', strtotime($data->date_event));
			}
			],
			// 'type_media_id',`
			[
				'name'=>'type_media_id',
				'value'=>'$data->typeMedia->name',
			],
		// 'image',
		// 'slug',
		// 'content',
		// 'images_song',
		/*
		'video_url',
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