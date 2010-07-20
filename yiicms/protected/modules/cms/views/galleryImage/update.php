<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	$gallery->name=>array('/cms/gallery/view', 'id'=>$gallery->id),
	$gallery_folder->name=>array('/cms/galleryFolder/view', 'id'=>$gallery_folder->id, 'gal'=>$gallery->id),
	$model->name=>array('view','id'=>$model->id, 'galfol'=>$gallery_folder->id, 'gal'=>$gallery->id),
	'Edycja',
);

$this->menu=array(
	array('label'=>'Powrót do katalogu', 'url'=>array('/cms/galleryFolder/view', 'id'=>$gallery_folder->id, 'gal'=>$gallery->id)),
	array('label'=>'Powrót do galerii', 'url'=>array('/cms/gallery/view', 'id'=>$gallery->id)),
	array('label'=>'Dodaj nowy obrazek', 'url'=>array('/cms/galleryImage/create', 'galfol'=>$gallery_folder->id, 'gal'=>$gallery->id)),
	array('label'=>'Podgląd obrazka', 'url'=>array('/cms/galleryImage/view', 'id'=>$model->id, 'galfol'=>$gallery_folder->id, 'gal'=>$gallery->id)),
);
?>

<h1>Edytuj obrazek "<?php echo $model->name; ?>"</h1>
<h4>Obrazek w katalogu "<?php echo $gallery_folder->name; ?>" z galerii "<?php echo $gallery->name; ?>"</h4>

<?php echo $this->renderPartial('_form', array('model'=>$model,'gallery'=>$gallery, 'gallery_folder'=>$gallery_folder)); ?>
