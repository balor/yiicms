<?php
$this->breadcrumbs=array(
	'Zasoby'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modyfikuj',
);

$this->menu=array(
//	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Utwórz zasób', 'url'=>array('create')),
	array('label'=>'Wyświetl zasób', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Zarządzaj zasobami', 'url'=>array('admin')),
);
?>

<h1>Update Content <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
