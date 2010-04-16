<?php
$this->breadcrumbs=array(
	'Gallery Items',
);

$this->menu=array(
	array('label'=>'Create GalleryItem', 'url'=>array('create')),
	array('label'=>'Manage GalleryItem', 'url'=>array('admin')),
);
?>

<h1>Gallery Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
