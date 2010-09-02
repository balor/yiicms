<?php
$this->breadcrumbs=array(
	'Zarządzaj użytkownikami'=>array('admin'),
	$model->email=>array('view','id'=>$model->id),
	'Edytuj użytkownika',
);

$this->menu=array(
	array('label'=>'Dodaj użytkownika', 'url'=>array('create')),
	array('label'=>'Pokaż użytkownika', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Zarządzaj użytkownikami', 'url'=>array('admin')),
);
?>

<h1>Edytuj użytkownika <?php echo $model->email; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
