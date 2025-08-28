<?php
$this->breadcrumbs=array(
	'Member Lists'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'MemberList',
'subtitle'=>'Add MemberList',
);

$this->menu=array(
array('label'=>'List MemberList', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>