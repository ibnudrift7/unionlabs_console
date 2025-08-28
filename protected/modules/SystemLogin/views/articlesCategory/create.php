<?php
$this->breadcrumbs=array(
	'Articles Categories'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Articles Category',
'subtitle'=>'Add Articles Category',
);

$this->menu=array(
array('label'=>'List Articles Category', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>