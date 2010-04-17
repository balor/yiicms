<?php
$this->breadcrumbs=array(
	'Gallery Folders'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GalleryFolder', 'url'=>array('index')),
	array('label'=>'Create GalleryFolder', 'url'=>array('create')),
	array('label'=>'View GalleryFolder', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GalleryFolder', 'url'=>array('admin')),
);
?>

<h1>Update GalleryFolder <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>