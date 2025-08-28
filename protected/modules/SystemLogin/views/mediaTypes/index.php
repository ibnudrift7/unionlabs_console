<?php
$this->breadcrumbs=array(
	'Media Types',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Media Types',
'subtitle'=>'Data Media Types',
);

$this->menu=array(
array('label'=>'Add Media Types', 'icon'=>'plus-sign','url'=>array('create')),
);

$countTypeArtikel = MediaTypes::model()->count();
?>
<?php 
if($countTypeArtikel == 0 || $countTypeArtikel > 3){
$this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); 
}
?>

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
			'id'=>'media-types-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
				'name',
				// 'image_cover',
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