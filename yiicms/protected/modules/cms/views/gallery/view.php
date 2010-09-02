<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Stwórz nowy katalog', 'url'=>array('/cms/galleryFolder/create', 'gal'=>$model->id)),
	array('label'=>'Utwórz galerię', 'url'=>array('create')),
	array('label'=>'Edytuj galerię', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Skasuj galerię', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Czy na pewno skasować tą galerię?')),
	array('label'=>'Zarządzaj galeriami', 'url'=>array('admin')),
	//array('label'=>'List Gallery', 'url'=>array('index')),
	//array('label'=>'Create Gallery', 'url'=>array('create')),
);
?>

<h1>Galeria: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
        array(
            'name'=>'created',
            'value'=>date("Y.m.d H:i:s", $model->created),
        ),
	),
)); ?>

<br />
<h3>Katalogi w galerii "<?php echo $model->name; ?>"</h3>

<?php
echo CHtml::link("+ Stwórz nowy katalog",
    $this->createUrl("/cms/galleryFolder/create", 
    array('gal'=>$model->id)),
    array('class'=>'add_link'));
?>
<br />
<br />
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-folder-grid',
	'dataProvider'=>$folders,
	'columns'=>array(
		'id',
		'name',
        array(
            'name'=>'icon',
            'type'=>'raw',
            'value'=>'CHtml::image(Yii::app()->createUrl("/cms/gallery/getImage", array("f"=>$data->icon)),$data->name)',
        ),
        array(
            'name'=>'created',
            'value'=>'date("Y.m.d H:i:s", $data->created)',
        ),
		array(
            'header'=>'Operacje',
			'class'=>'CButtonColumn',
            'deleteConfirmation'=>'Czy na pewno skasować ten katalog?',
            'viewButtonUrl'=>'Yii::app()->createUrl("/cms/galleryFolder/view", array("id" => $data->id, "gal"=>'.$model->id.'))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/cms/galleryFolder/delete", array("id" => $data->id, "gal"=>'.$model->id.'))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/cms/galleryFolder/update", array("id" => $data->id, "gal"=>'.$model->id.'))',
		),
	),
)); ?>
