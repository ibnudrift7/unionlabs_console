<?php
$this->breadcrumbs=array(
	'Post Types'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'PostTypes',
'subtitle'=>'Edit PostTypes',
);

$this->menu=array(
array('label'=>'List PostTypes', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add PostTypes', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View PostTypes', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>