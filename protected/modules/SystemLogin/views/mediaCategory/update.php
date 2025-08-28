<?php
$this->breadcrumbs=array(
	'Media List Categories'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Media Category',
'subtitle'=>'Edit Media Category',
);

$this->menu=array(
array('label'=>'List Media Category', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Media Category', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Media Category', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>