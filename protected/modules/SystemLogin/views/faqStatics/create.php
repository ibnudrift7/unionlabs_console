<?php
$this->breadcrumbs=array(
	'Faq Statics'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'FaqStatics',
'subtitle'=>'Add FaqStatics',
);

$this->menu=array(
array('label'=>'List FaqStatics', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>