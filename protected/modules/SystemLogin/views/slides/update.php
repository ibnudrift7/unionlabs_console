<?php
$this->breadcrumbs=array(
	'Slides'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Slides',
'subtitle'=>'Edit Slides',
);

$this->menu=array(
array('label'=>'List Slides', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Slides', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Slides', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>