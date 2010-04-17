<?php
$this->breadcrumbs=array(
	'Gallery Folders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GalleryFolder', 'url'=>array('index')),
	array('label'=>'Manage GalleryFolder', 'url'=>array('admin')),
);
?>

<h1>Create GalleryFolder</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>