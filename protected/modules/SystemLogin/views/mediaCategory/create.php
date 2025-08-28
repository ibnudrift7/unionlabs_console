<?php
$this->breadcrumbs=array(
	'Media List Categories'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Media Category',
'subtitle'=>'Add Media Category',
);

$this->menu=array(
array('label'=>'List Media Category', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>