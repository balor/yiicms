<?php
$this->breadcrumbs=array(
	'Taksonomys'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List Taksonomy', 'url'=>array('index')),
	array('label'=>'Stwórz nową kategorię', 'url'=>array('create')),
	array('label'=>'Pokaż kategorię', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Zarządzaj taksonomią', 'url'=>array('admin')),
);
?>

<h1>Edytuj kategorię "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'categories'=>$categories)); ?>