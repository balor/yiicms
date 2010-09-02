<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	'Zarządzanie taksonomią strony'=>array('/cms/taksonomy/admin'),
	'Kategoria '.$model->name=>array('view','id'=>$model->id),
	'Edycja modelu',
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