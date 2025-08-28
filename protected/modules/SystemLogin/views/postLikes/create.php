<?php
$this->breadcrumbs=array(
	'Post Likes'=>array('index'),
	'Add',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'PostLikes',
'subtitle'=>'Add PostLikes',
);

$this->menu=array(
array('label'=>'List PostLikes', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>