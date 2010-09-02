<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	'Zarządzanie taksonomią strony'=>array('/cms/taksonomy/admin'),
	'Utwórz kategorię',
);

$this->menu=array(
//	array('label'=>'List Taksonomy', 'url'=>array('index')),
	array('label'=>'Zarządzaj taksonomią', 'url'=>array('admin')),
);
?>

<h1>Utwórz kategorię</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'categories'=>$categories)); ?>