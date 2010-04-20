<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	$gallery->name=>array('/cms/gallery/view', 'id'=>$gallery->id),
	$gallery_folder->name=>array('/cms/galleryFolder/view', 'id'=>$gallery_folder->id, 'gal'=>$gallery->id),
	$model->name,
);

$this->menu=array(
	array('label'=>'Powrót do katalogu', 'url'=>array('/cms/galleryFolder/view', 'id'=>$gallery_folder->id, 'gal'=>$gallery->id)),
	array('label'=>'Powrót do galerii', 'url'=>array('/cms/gallery/view', 'id'=>$gallery->id)),
	array('label'=>'Dodaj nowy obrazek', 'url'=>array('/cms/galleryImage/create', 'galfol'=>$gallery_folder->id, 'gal'=>$gallery->id)),
	array('label'=>'Edytuj obrazek', 'url'=>array('update', 'id'=>$model->id, 'galfol'=>$gallery_folder->id, 'gal'=>$gallery->id)),
	array('label'=>'Usuń obrazek', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id,'gal'=>$gallery->id,'galfol'=>$gallery_folder->id),'confirm'=>'Czy na pewno skasować ten obrazek?')),
);
?>

<h1>Obrazek "<?php echo $model->name; ?>"</h1>
<h4>Obrazek w katalogu "<?php echo $gallery_folder->name; ?>" z galerii "<?php echo $gallery->name; ?>"</h4>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'author',
		'image_dimensions',
        array(
            'name'=>'image_size',
            'type'=>'raw',
            'value'=>round($model->image_size/1000,2)."k",
        ),
        /*array(
            'label'=>'Podgląd',
            'name'=>'image_filename',
            'value'=>"\$this->widget('application.modules.cms.extensions.querybox.CQueryboxWidget', array(
                    'images' => array(
                        array('path'=>Yii::app()->createUrl('/cms/gallery/getImage', 
                        array('f'=>".$model->image_filename.".'_t')),'title'=>".$model->name."),
                        )
                    ))"
                ),*/
        array(
            'name'=>'created',
            'value'=>date("Y.m.d H:i:s", $model->created),
        ),
	),
)); 
echo '<br /><br /><h4>Podgląd (kliknij by obejżeć pełną wersję obrazka):</h4>';
$this->widget(
    'application.modules.cms.extensions.querybox.CQueryboxWidget', 
    array(
        'yiicms_images' => array($model),
    )
);
?>
