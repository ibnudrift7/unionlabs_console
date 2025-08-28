<?php
$this->breadcrumbs=array(
	'Media Types'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'MediaTypes',
'subtitle'=>'Add MediaTypes',
);

$this->menu=array(
array('label'=>'List MediaTypes', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>