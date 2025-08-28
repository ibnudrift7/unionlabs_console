<?php
$this->breadcrumbs=array(
	'Music Lists'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Music',
'subtitle'=>'Edit Music',
);

$this->menu=array(
array('label'=>'List Music', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Music', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Music', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>