<?php
$this->breadcrumbs=array(
	'Rekening Lists'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Rekening List',
'subtitle'=>'Edit Rekening List',
);

$this->menu=array(
array('label'=>'List Rekening List', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Rekening List', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View Rekening List', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>