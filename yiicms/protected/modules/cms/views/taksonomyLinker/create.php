<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	$model->content->name=>array('/cms/content/view','id'=>$model->content->id),
	'Dodaj zawartość do kategorii',
);

$this->menu=array(
	array('label'=>'Powrót do "'.$model->content->name.'"',
        'url'=>array('/cms/content/view','id'=>$model->content->id)),
);
?>

<h1>Dodaj zawartość do kategorii</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
