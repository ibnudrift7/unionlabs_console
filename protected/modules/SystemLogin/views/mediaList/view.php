<?php
$this->breadcrumbs=array(
	'Media List Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MediaListItems', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add MediaListItems', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit MediaListItems', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete MediaListItems', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View MediaListItems #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'image',
		'slug',
		'content',
		'images_song',
		'video_url',
		'date_event',
		'created_at',
		'deleted_at',
		'type_media_id',
	),
)); ?>
