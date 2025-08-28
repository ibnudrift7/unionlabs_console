<?php
$this->breadcrumbs=array(
	'Artikel Lists'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'ArtikelList',
'subtitle'=>'Add ArtikelList',
);

$this->menu=array(
array('label'=>'List ArtikelList', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>