<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	$gallery->name=>array('/cms/gallery/view', 'id'=>$gallery->id),
    $model->name=>array('/cms/galleryFolder/view', 'id'=>$model->id, 'gal'=>$gallery->id),
	'Edycja',
);

$this->menu=array(
	array('label'=>'Powrót do galerii', 'url'=>array('/cms/gallery/view', 'id'=>$gallery->id)),
	array('label'=>'Podląd katalogu', 'url'=>array('view', 'id'=>$model->id, 'gal'=>$gallery->id)),
	array('label'=>'Stwórz nowy katalog', 'url'=>array('create', 'gal'=>$gallery->id)),
);
?>

<h1>Edycja katalogu "<?php echo $model->name; ?>"</h1>
<h4>Katalog z galerii "<?php echo $gallery->name; ?>"</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model,'gallery'=>$gallery)); ?>
