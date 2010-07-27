<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	$gallery->name=>array('/cms/gallery/view', 'id'=>$gallery->id),
	$model->name,
);

$this->menu=array(
	array('label'=>'Powrót do galerii', 'url'=>array('/cms/gallery/view', 'id'=>$gallery->id)),
	array('label'=>'Stwórz nowy katalog', 'url'=>array('create', 'gal'=>$gallery->id)),
	array('label'=>'Edytuj katalog', 'url'=>array('update', 'id'=>$model->id, 'gal'=>$gallery->id)),
	array('label'=>'Usuń katalog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id,'gal'=>$gallery->id),'confirm'=>'Czy na pewno skasować tą kategorię?')),
);
?>

<h1>Katalog: <?php echo $model->name; ?> </h1>
<h4>Katalog z galerii "<?php echo $gallery->name; ?>"</h4>

<?php 

$data = $model;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
        array(
            'label'=>'Podgląd',
            'name'=>'icon',
            'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->createUrl("/cms/gallery/getImage", array("f"=>$data->icon)),$data->name),
        ),
        array(
            'name'=>'created',
            'value'=>date("Y.m.d H:i:s", $model->created),
        ),
	),
)); ?>

<br />
<h3>Obrazki w katalogu "<?php echo $model->name; ?>"</h3>

<?php echo CHtml::link("+ Dodaj obrazek", $this->createUrl("/cms/galleryImage/create", array('gal'=>$gallery->id, 'galfol'=>$model->id)), array('class'=>'add_link')); ?>
<br />
<br />
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-folder-grid',
	'dataProvider'=>$items,
	'columns'=>array(
		'id',
		'name',
		'author',
        'image_dimensions',
        array(
            'name'=>'image_size',
            'type'=>'raw',
            'value'=>'(round($data->image_size/1000,2)."k")',
        ),
        array(
            'header'=>'Obrazek',
            'type'=>'raw',
            'value'=>'CHtml::image(Yii::app()->createUrl("/cms/gallery/getImage", array("f"=>$data->image_filename.\'_t\')),$data->name)',
        ),
        array(
            'name'=>'created',
            'value'=>'date("Y.m.d H:i:s", $data->created)',
        ),
		array(
            'header'=>'Operacje',
			'class'=>'CButtonColumn',
            'deleteConfirmation'=>'Czy na pewno skasować ten katalog?',
            'viewButtonUrl'=>'Yii::app()->createUrl("/cms/galleryImage/view", array("id" => $data->id, "gal"=>'.$gallery->id.', "galfol"=>'.$model->id.'))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/cms/galleryImage/delete", array("id" => $data->id, "gal"=>'.$gallery->id.', "galfol"=>'.$model->id.'))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/cms/galleryImage/update", array("id" => $data->id, "gal"=>'.$gallery->id.', "galfol"=>'.$model->id.'))',
		),
	),
)); ?>
