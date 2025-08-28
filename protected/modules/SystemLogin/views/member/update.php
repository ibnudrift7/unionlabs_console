<?php
$this->breadcrumbs=array(
	'User Members'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'Members',
'subtitle'=>'Edit Members',
);

$this->menu=array(
array('label'=>'List Members', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add Members', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View UserMembers', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>