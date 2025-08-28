<?php
$this->breadcrumbs=array(
	'Master Couriers'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Couriers',
'subtitle'=>'Add Couriers',
);

$this->menu=array(
array('label'=>'List Couriers', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>