<?php
$this->breadcrumbs=array(
	'Media List Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MediaListItems','url'=>array('index')),
	array('label'=>'Add MediaListItems','url'=>array('create')),
);
?>

<h1>Manage Media List Items</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'media-list-items-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'image',
		'slug',
		'content',
		'images_song',
		/*
		'video_url',
		'date_event',
		'created_at',
		'deleted_at',
		'type_media_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
