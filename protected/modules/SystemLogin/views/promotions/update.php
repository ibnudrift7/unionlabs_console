<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Promotions',
'subtitle'=>'Edit Promotions',
);

$this->menu=array(
array('label'=>'List Promotions', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Promotions', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Promotions', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>