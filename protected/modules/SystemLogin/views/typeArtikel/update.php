<?php
$this->breadcrumbs=array(
	'Type Artikels'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Type Artikel',
'subtitle'=>'Edit Type Artikel',
);

$this->menu=array(
array('label'=>'List Type Artikel', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Type Artikel', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Type Artikel', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>