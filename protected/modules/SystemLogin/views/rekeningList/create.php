<?php
$this->breadcrumbs=array(
	'Rekening Lists'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Rekening List',
'subtitle'=>'Add Rekening List',
);

$this->menu=array(
array('label'=>'List Rekening List', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>