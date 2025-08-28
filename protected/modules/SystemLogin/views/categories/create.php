<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Categories',
'subtitle'=>'Add Categories',
);

$this->menu=array(
array('label'=>'List Categories', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>