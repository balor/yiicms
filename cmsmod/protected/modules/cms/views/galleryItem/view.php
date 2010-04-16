<?php
$this->breadcrumbs=array(
	'Gallery Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List GalleryItem', 'url'=>array('index')),
	array('label'=>'Create GalleryItem', 'url'=>array('create')),
	array('label'=>'Update GalleryItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GalleryItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage GalleryItem', 'url'=>array('admin')),
);
?>

<h1>View GalleryItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'author',
		'image_path',
		'image_dimensions',
		'image_size',
		'image_filename',
		'created',
	),
)); ?>
