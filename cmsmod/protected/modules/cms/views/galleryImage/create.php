<?php
$this->breadcrumbs=array(
	'Gallery Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GalleryImage', 'url'=>array('index')),
	array('label'=>'Manage GalleryImage', 'url'=>array('admin')),
);
?>

<h1>Create GalleryImage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>