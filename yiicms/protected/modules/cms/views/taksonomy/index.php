<?php
$this->breadcrumbs=array(
	'Taksonomys',
);

$this->menu=array(
	array('label'=>'Create Taksonomy', 'url'=>array('create')),
	array('label'=>'Manage Taksonomy', 'url'=>array('admin')),
);
?>

<h1>Taksonomys</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
