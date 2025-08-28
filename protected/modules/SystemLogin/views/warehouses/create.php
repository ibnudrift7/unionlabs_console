<?php
$this->breadcrumbs=array(
	'Warehouses'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Warehouses',
'subtitle'=>'Add Warehouses',
);

$this->menu=array(
array('label'=>'List Warehouses', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>