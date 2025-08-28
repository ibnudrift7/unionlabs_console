<?php
$this->breadcrumbs=array(
	'Type Artikels',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Type Artikel',
'subtitle'=>'Data Type Artikel',
);

$this->menu=array(
array('label'=>'Add Type', 'icon'=>'th-list','url'=>array('create')),
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
			'id'=>'type-artikel-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
		'name',
		// 'image',
		[
			'name' => 'image',
			'type' => 'raw',
			'value' => function ($data) {
				return CHtml::image(Yii::app()->baseUrl . ImageHelper::thumb(90, 80, '/images/type_artikel/' . $data->image, array('method' => 'adaptiveResize', 'quality' => '90')));
			},
		],
		// 'created_at',
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