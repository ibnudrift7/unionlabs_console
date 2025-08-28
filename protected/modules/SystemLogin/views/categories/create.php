<?php
$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'ProductCategories',
'subtitle'=>'Add ProductCategories',
);

$this->menu=array(
array('label'=>'List ProductCategories', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>