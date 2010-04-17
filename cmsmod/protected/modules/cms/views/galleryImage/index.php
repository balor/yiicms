<?php
$this->breadcrumbs=array(
	'Gallery Images',
);

$this->menu=array(
	array('label'=>'Create GalleryImage', 'url'=>array('create')),
	array('label'=>'Manage GalleryImage', 'url'=>array('admin')),
);
?>

<h1>Gallery Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
