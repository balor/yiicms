<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Edycja galerii',
);

$this->menu=array(
//	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Utwórz galerię', 'url'=>array('create')),
	array('label'=>'Podgląd galerii', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Zarządzaj galeriami', 'url'=>array('admin')),
);
?>

<h1>Edytuj galerię <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
