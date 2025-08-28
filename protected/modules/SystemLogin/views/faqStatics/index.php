<?php
$this->breadcrumbs = array(
	'Faq Statics',
);

$this->pageHeader = array(
	'icon' => 'fa fa-minus',
	'title' => 'FaqStatics',
	'subtitle' => 'Data FaqStatics',
);

$this->menu = array(
	array('label' => 'Add FaqStatics', 'icon' => 'th-list', 'url' => array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup', array('buttons' => $this->menu,)); ?>
<?php if (Yii::app()->user->hasFlash('success')): ?>

	<?php $this->widget('bootstrap.widgets.TbAlert', array(
		'alerts' => array('success'),
	)); ?>

<?php endif; ?>

<div class="card mt-3">
	<div class="card-body">
		<h5 class="card-title">
			<?=
			$this->pageHeader['subtitle'] ?>
		</h5>
		<div class="wrapped datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">

			<?php $this->widget('bootstrap.widgets.TbGridView', array(
				'id' => 'faq-statics-grid',
				'dataProvider' => $model->search(),
				// 'filter'=>$model,
				'enableSorting' => false,
				'summaryText' => false,
				'type' => 'bordered',
				'columns' => array(
					'id',
					'name',
					'proyek_id',
					'topic_id',
					'questions',
					'answers',
					/*
		'deleted_at',
		*/
					array(
						'class' => 'bootstrap.widgets.TbButtonColumn',
						'template' => '{update} &nbsp; {delete}',
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