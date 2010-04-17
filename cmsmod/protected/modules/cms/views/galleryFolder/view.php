<?php
$this->breadcrumbs=array(
	'Gallery Folders'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List GalleryFolder', 'url'=>array('index')),
	array('label'=>'Create GalleryFolder', 'url'=>array('create')),
	array('label'=>'Update GalleryFolder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GalleryFolder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage GalleryFolder', 'url'=>array('admin')),
);
?>

<h1>View GalleryFolder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'gallery_id',
		'icon',
		'created',
	),
)); ?>
