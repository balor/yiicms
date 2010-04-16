<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	'Utwórz element galerii',
);

$this->menu=array(
	//array('label'=>'List GalleryItem', 'url'=>array('index')),
	array('label'=>'Wróć do podglądu galerii', 'url'=>array('/cms/gallery/view', array('id'=>$gallery->id))),
);
?>

<h1>Utwórz element galerii</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
