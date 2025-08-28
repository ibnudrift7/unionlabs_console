<?php
$this->breadcrumbs=array(
	'User Addresses'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'UserAddresses',
'subtitle'=>'Add UserAddresses',
);

$this->menu=array(
array('label'=>'List UserAddresses', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>