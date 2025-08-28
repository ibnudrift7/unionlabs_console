<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Members',
'subtitle'=>'Add Members',
);

$this->menu=array(
array('label'=>'List Members', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>