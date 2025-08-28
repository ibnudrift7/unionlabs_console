<?php
$this->breadcrumbs=array(
	'Artikel Lists',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Artikel List',
'subtitle'=>'Data Artikel List',
);

$this->menu=array(
array('label'=>'Add Artikel List', 'icon'=>'plus-sign','url'=>array('create')),
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
			'id'=>'artikel-list-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
		// 'title',
		[
			'name'=>'title',
			'type'=>'raw',
			'value'=> function($data) {
				return substr($data->title, 0, 50). '...';
			},
		],
		// 'image',
		// 'slug',
		// 'content',
		// 'dates',
		[
			'name'=>'dates',
			'type'=>'raw',
			'value'=> function($data) {
				return date('Y-m-d', strtotime($data->dates)) ?? '-';
			},
		],
		// 'type_artikel_id',
		[
			'name'=>'type_artikel_id',
			'header'=>'Type',
			'type'=>'raw',
			'value'=> function($data) {
				return $data->typeArtikel->name ?? '-';
			},
		],
		// 'articles_category_id',
		[
			'name'=>'articles_category_id',
			'header'=>'Category',
			'type'=>'raw',
			'value'=> function($data) {
				return $data->category->name ?? '-';
			},
		],
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