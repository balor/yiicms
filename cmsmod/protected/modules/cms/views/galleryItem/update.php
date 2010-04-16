<?php
$this->breadcrumbs=array(
	'Gallery Items'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GalleryItem', 'url'=>array('index')),
	array('label'=>'Create GalleryItem', 'url'=>array('create')),
	array('label'=>'View GalleryItem', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GalleryItem', 'url'=>array('admin')),
);
?>

<h1>Update GalleryItem <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>