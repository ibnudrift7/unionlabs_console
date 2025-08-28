<?php
$this->breadcrumbs=array(
	'Promotions'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Promotions',
'subtitle'=>'Add Promotions',
);

$this->menu=array(
array('label'=>'List Promotions', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>