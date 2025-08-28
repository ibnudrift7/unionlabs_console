<?php
$this->breadcrumbs=array(
	'Post Types'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'PostTypes',
'subtitle'=>'Add PostTypes',
);

$this->menu=array(
array('label'=>'List PostTypes', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>