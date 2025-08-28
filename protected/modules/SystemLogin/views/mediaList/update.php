<?php
$this->breadcrumbs=array(
	'Media List Items'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Media List',
'subtitle'=>'Edit Media List',
);

$this->menu=array(
array('label'=>'List Media List', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Media List', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Media List', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>