<?php
$this->breadcrumbs=array(
	'Master Brands'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Brands',
'subtitle'=>'Add Brands',
);

$this->menu=array(
array('label'=>'List Brands', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>