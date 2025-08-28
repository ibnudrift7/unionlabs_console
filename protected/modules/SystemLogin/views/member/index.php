<?php
$this->breadcrumbs=array(
	'User Members',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Members',
'subtitle'=>'Data Members',
);

$this->menu=array(
array('label'=>'Add Members', 'icon'=>'th-list','url'=>array('create')),
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
			'id'=>'user-members-grid',
			'dataProvider'=>$model->search(),
			// 'filter'=>$model,
			'enableSorting'=>false,
			'summaryText'=>false,
			'type'=>'bordered',
			'columns'=>array(
					// 'id',
		'email',
		// 'password_hash',
		'full_name',
		'phone',
		'date_of_birth',
		// 'is_active',
		[
			'name' => 'is_active',
			'value' => '$data->is_active == 1 ? "Active" : "Inactive"',
		],
		// 'is_banned',
		[
			'name' => 'is_banned',
			'value' => '$data->is_banned == 1 ? "Banned" : "Not Banned"',
		],
		/*
		'level_id',
		'points_balance',
		'created_at',
		'updated_at',
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