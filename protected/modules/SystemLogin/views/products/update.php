<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Products',
'subtitle'=>'Edit Products',
);

$this->menu=array(
array('label'=>'List Products', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Products', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Products', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>