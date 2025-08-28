<?php
$this->breadcrumbs=array(
	'User Addresses'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'UserAddresses',
'subtitle'=>'Edit UserAddresses',
);

$this->menu=array(
array('label'=>'List UserAddresses', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add UserAddresses', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View UserAddresses', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>