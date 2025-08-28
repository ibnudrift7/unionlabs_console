<?php
$this->breadcrumbs=array(
	'Post Likes'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
'icon'=>'fa fa-minus',
'title'=>'PostLikes',
'subtitle'=>'Edit PostLikes',
);

$this->menu=array(
array('label'=>'List PostLikes', 'icon'=>'th-list','url'=>array('index')),
array('label'=>'Add PostLikes', 'icon'=>'plus-sign','url'=>array('create')),
// array('label'=>'View PostLikes', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>