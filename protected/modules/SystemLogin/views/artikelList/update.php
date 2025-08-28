<?php
$this->breadcrumbs=array(
	'Artikel Lists'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'ArtikelList',
'subtitle'=>'Edit ArtikelList',
);

$this->menu=array(
array('label'=>'List ArtikelList', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add ArtikelList', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View ArtikelList', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>