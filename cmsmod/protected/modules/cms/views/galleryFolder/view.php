<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('/cms/gallery/admin'),
	$gallery->name=>array('/cms/gallery/view', 'id'=>$gallery->id),
	$model->name,
);

$this->menu=array(
	array('label'=>'Powrót do galerii', 'url'=>array('/cms/gallery/view', 'id'=>$gallery->id)),
	array('label'=>'Stwórz nową kategorię', 'url'=>array('create', 'gal'=>$gallery->id)),
	array('label'=>'Edytuj kategorię', 'url'=>array('update', 'id'=>$model->id, 'gal'=>$gallery->id)),
	array('label'=>'Usuń kategorię', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Czy na pewno skasować tą kategorię?')),
);
?>

<h1>Kategoria: <?php echo $model->name; ?> </h1>
<h4>Kategoria z galerii "<?php echo $gallery->name; ?>"</h4>

<?php 

$data = $model;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
        array(
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
