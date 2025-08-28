<?php
$this->breadcrumbs=array(
	'Master Order Statuses'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'MasterOrderStatus',
'subtitle'=>'Edit MasterOrderStatus',
);

$this->menu=array(
array('label'=>'List MasterOrderStatus', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add MasterOrderStatus', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View MasterOrderStatus', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>