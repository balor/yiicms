<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	$gallery->name=>array('/cms/gallery/view', 'id'=>$gallery->id),
	'Stwórz nowy katalog',
);

$this->menu=array(
	array('label'=>'Powrót do galerii', 'url'=>array('/cms/gallery/view', 'id'=>$gallery->id)),
);
?>

<h1>Stwórz nowy katalog w galerii "<?php echo $gallery->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'gallery'=>$gallery)); ?>
