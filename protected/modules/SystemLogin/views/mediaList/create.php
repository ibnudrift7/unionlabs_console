<?php
$this->breadcrumbs=array(
	'Media List Items'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Media List',
'subtitle'=>'Add Media List',
);

$this->menu=array(
array('label'=>'List Media List', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>