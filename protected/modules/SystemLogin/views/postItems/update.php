<?php
$this->breadcrumbs=array(
	'Post Items'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'PostItems',
'subtitle'=>'Edit PostItems',
);

$this->menu=array(
array('label'=>'List PostItems', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add PostItems', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View PostItems', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>