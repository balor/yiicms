<?php
$this->breadcrumbs=array(
	'Lista użytkowników',
);

$this->menu=array(
	array('label'=>'Dodaj użytkownika', 'url'=>array('create')),
	array('label'=>'Zarządzaj użytkownikami', 'url'=>array('admin')),
);
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
