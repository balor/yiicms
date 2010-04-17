<?php
$this->breadcrumbs=array(
	'Gallery Images'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GalleryImage', 'url'=>array('index')),
	array('label'=>'Create GalleryImage', 'url'=>array('create')),
	array('label'=>'View GalleryImage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GalleryImage', 'url'=>array('admin')),
);
?>

<h1>Update GalleryImage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>