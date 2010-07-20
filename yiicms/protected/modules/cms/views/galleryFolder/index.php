<?php
$this->breadcrumbs=array(
	'Gallery Folders',
);

$this->menu=array(
	array('label'=>'Create GalleryFolder', 'url'=>array('create')),
	array('label'=>'Manage GalleryFolder', 'url'=>array('admin')),
);
?>

<h1>Gallery Folders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
