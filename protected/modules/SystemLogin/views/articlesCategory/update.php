<?php
$this->breadcrumbs=array(
	'Articles Categories'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Articles Category',
'subtitle'=>'Edit Articles Category',
);

$this->menu=array(
array('label'=>'List Articles Category', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Articles Category', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Articles Category', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>