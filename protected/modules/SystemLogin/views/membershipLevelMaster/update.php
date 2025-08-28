<?php
$this->breadcrumbs=array(
	'User Member Level Masters'=>array('index'),
	// $model->name=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'UserMemberLevelMaster',
'subtitle'=>'Edit UserMemberLevelMaster',
);

$this->menu=array(
array('label'=>'List UserMemberLevelMaster', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add UserMemberLevelMaster', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View UserMemberLevelMaster', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>