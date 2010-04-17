<?php
$this->breadcrumbs=array(
	'Zarządzanie galeriami'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Utwórz galerię', 'url'=>array('create')),
	array('label'=>'Edytuj galerię', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Skasuj galerię', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Czy na pewno skasować tą galerię?')),
	array('label'=>'Zarządzaj galeriami', 'url'=>array('admin')),
	//array('label'=>'List Gallery', 'url'=>array('index')),
	//array('label'=>'Create Gallery', 'url'=>array('create')),
);
?>

<h1>Podgląd galerii <?php echo $model->name; ?></h1>

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
