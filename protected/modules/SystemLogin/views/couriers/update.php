<?php
$this->breadcrumbs=array(
	'Master Couriers'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Couriers',
'subtitle'=>'Edit Couriers',
);

$this->menu=array(
array('label'=>'List Couriers', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Couriers', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View MasterCouriers', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>