<?php
$this->breadcrumbs=array(
	'Zarządzaj użytkownikami'=>array('admin'),
	'Dodaj użytkownika',
);

$this->menu=array(
	array('label'=>'Zarządzaj użytkownikami', 'url'=>array('admin')),
);
?>

<h1>Dodaj użytkownika</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
