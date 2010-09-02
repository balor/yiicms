<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	$gallery->name=>array('/cms/gallery/view', 'id'=>$gallery->id),
	$gallery_folder->name=>array('/cms/galleryFolder/view', 'id'=>$gallery_folder->id, 'gal'=>$gallery->id),
	'Dodaj obrazek',
);

$this->menu=array(
	array('label'=>'Powrót do kategorii', 'url'=>array('/cms/galleryFolder/view', 'id'=>$gallery_folder->id, 'gal'=>$gallery->id)),
	array('label'=>'Powrót do galerii', 'url'=>array('/cms/gallery/view', 'id'=>$gallery->id)),
);
?>

<h1>Dodaj obrazek do katalogu "<?php echo $gallery_folder->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'gallery'=>$gallery,'gallery_folder'=>$gallery_folder)); ?>
