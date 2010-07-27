<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	$model->getContent()->name=>array('/cms/content/view','id'=>$model->getContent()->id),
	'Dodaj zawartość do kategorii',
);

$this->menu=array(
	array('label'=>'Powrót do "'.$model->getContent()->name.'"',
        'url'=>array('/cms/content/view','id'=>$model->getContent()->id)),
);
?>

<h1>Dodaj zawartość do kategorii</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>