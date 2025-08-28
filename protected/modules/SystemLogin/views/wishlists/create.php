<?php
$this->breadcrumbs=array(
	'Wishlists'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Wishlists',
'subtitle'=>'Add Wishlists',
);

$this->menu=array(
array('label'=>'List Wishlists', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>