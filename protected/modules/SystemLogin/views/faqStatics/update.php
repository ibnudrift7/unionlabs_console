<?php
$this->breadcrumbs=array(
	'Faq Statics'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'FaqStatics',
'subtitle'=>'Edit FaqStatics',
);

$this->menu=array(
array('label'=>'List FaqStatics', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add FaqStatics', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View FaqStatics', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>