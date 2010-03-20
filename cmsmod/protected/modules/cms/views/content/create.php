<?php
$this->breadcrumbs=array(
	'Zasoby'=>array('index'),
	'Utwórz',
);

$this->menu=array(
//	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Zarządzaj zasobami', 'url'=>array('admin')),
);
?>

<h1>Create Content</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
