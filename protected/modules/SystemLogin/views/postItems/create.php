<?php
$this->breadcrumbs=array(
	'Post Items'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'PostItems',
'subtitle'=>'Add PostItems',
);

$this->menu=array(
array('label'=>'List PostItems', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>