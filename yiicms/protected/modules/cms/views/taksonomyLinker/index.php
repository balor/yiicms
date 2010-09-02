<?php
$this->breadcrumbs=array(
	'Taksonomy Linkers',
);

$this->menu=array(
	array('label'=>'Create TaksonomyLinker', 'url'=>array('create')),
	array('label'=>'Manage TaksonomyLinker', 'url'=>array('admin')),
);
?>

<h1>Taksonomy Linkers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
