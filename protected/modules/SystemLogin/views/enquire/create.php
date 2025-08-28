<?php
$this->breadcrumbs=array(
	'Enquire Forms'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'EnquireForm',
'subtitle'=>'Add EnquireForm',
);

$this->menu=array(
array('label'=>'List EnquireForm', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>