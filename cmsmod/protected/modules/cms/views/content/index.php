<?php
$this->breadcrumbs=array(
	'Zasoby',
);

$this->menu=array(
	array('label'=>'Utwórz zasób', 'url'=>array('create')),
	array('label'=>'Zarządzaj zasobami', 'url'=>array('admin')),
);
?>

<h1>Lista zasobów</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
