<?php
$this->breadcrumbs=array(
	'Master Order Statuses'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'MasterOrderStatus',
'subtitle'=>'Add MasterOrderStatus',
);

$this->menu=array(
array('label'=>'List MasterOrderStatus', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>