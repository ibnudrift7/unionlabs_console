<?php
$this->breadcrumbs=array(
	'Music Lists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MusicList','url'=>array('index')),
	array('label'=>'Add MusicList','url'=>array('create')),
);
?>

<h1>Manage Music Lists</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'music-list-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'album_id',
		'names',
		'image',
		'contents',
		'duration',
		/*
		'source_music',
		'image_lyric',
		'created_at',
		'updated_at',
		'deleted_at',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
