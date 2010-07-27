<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	$model->getContent()->name=>array('/cms/content/view','id'=>$model->getContent()->id),
	'Dodaj zawartość do kategorii',
);

$this->menu=array(
	array('label'=>'List TaksonomyLinker', 'url'=>array('index')),
	array('label'=>'Manage TaksonomyLinker', 'url'=>array('admin')),
);
?>

<h1>Dodaj zawartość do kategorii</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>