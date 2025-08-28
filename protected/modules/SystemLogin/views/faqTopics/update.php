<?php
$this->breadcrumbs=array(
	'Faq Topics'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'FaqTopics',
'subtitle'=>'Edit FaqTopics',
);

$this->menu=array(
array('label'=>'List FaqTopics', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add FaqTopics', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View FaqTopics', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>