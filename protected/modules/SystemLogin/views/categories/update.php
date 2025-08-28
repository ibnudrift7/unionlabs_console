<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Categories',
'subtitle'=>'Edit Categories',
);

$this->menu=array(
array('label'=>'List Categories', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Categories', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View ProductCategories', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>