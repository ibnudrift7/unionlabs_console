<?php
$this->breadcrumbs=array(
	'Faq Topics'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'FaqTopics',
'subtitle'=>'Add FaqTopics',
);

$this->menu=array(
array('label'=>'List FaqTopics', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>