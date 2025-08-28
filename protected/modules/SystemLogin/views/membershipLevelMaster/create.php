<?php
$this->breadcrumbs=array(
	'User Member Level Masters'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'UserMemberLevelMaster',
'subtitle'=>'Add UserMemberLevelMaster',
);

$this->menu=array(
array('label'=>'List UserMemberLevelMaster', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>