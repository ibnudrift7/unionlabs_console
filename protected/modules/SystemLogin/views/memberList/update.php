<?php
$this->breadcrumbs=array(
	'Member Lists'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'MemberList',
'subtitle'=>'Edit MemberList',
);

$this->menu=array(
array('label'=>'List MemberList', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add MemberList', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View MemberList', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>