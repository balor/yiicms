<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	$gallery->name=>array('/cms/gallery/view', 'id'=>$gallery->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Powrót do galerii', 'url'=>array('/cms/gallery/view', 'id'=>$gallery->id)),
	array('label'=>'Podląd kategorii', 'url'=>array('view', 'id'=>$model->id, 'gal'=>$gallery->id)),
	array('label'=>'Stwórz nową kategorię', 'url'=>array('create', 'gal'=>$gallery->id)),
);
?>

<h1>Edycja kategorii <?php echo $model->name; ?></h1>
<h4>Kategoria z galerii "<?php echo $gallery->name; ?>"</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
