<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	'Utwórz galerię',
);

$this->menu=array(
//	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Zarządzaj galeriami', 'url'=>array('admin')),
);
?>

<h1>Utwórz galerię</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
