<?php
$this->breadcrumbs=array(
	'Post Comments'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'PostComments',
'subtitle'=>'Add PostComments',
);

$this->menu=array(
array('label'=>'List PostComments', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>