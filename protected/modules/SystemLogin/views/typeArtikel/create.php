<?php
$this->breadcrumbs=array(
	'Type Artikels'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Type Artikel',
'subtitle'=>'Add Type Artikel',
);

$this->menu=array(
array('label'=>'List Type Artikel', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>