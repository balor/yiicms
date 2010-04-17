<?php
$this->breadcrumbs=array(
	'Gallery Images'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List GalleryImage', 'url'=>array('index')),
	array('label'=>'Create GalleryImage', 'url'=>array('create')),
	array('label'=>'Update GalleryImage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GalleryImage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage GalleryImage', 'url'=>array('admin')),
);
?>

<h1>View GalleryImage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'gallery_folder_id',
		'name',
		'author',
		'image_dimensions',
		'image_size',
		'image_filename',
		'created',
	),
)); ?>
