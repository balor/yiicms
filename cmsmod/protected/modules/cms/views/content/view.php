<?php
$this->breadcrumbs=array(
	'Zasoby'=>array('index'),
	$model->id,
);

$this->menu=array(
//	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Utwórz zasób', 'url'=>array('create')),
	array('label'=>'Edytuj zasób', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Skasuj zasób', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Czy na pewno skasować ten zasób?')),
	array('label'=>'Zarządzaj zasobami', 'url'=>array('admin')),
);
?>

<h1>Podgląd zasobu z pola: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'author',
        array(
            'name'=>'created',
            'value'=>date("Y.m.d H:i:s", $model->created),
        ),
        array(
            'name'=>'modified',
            'value'=>date("Y.m.d H:i:s", $model->modified),
        ),
	),
)); ?>

<br />
<br />
<strong>Podgląd:</strong>
<div id="content_preview">
    <?php echo $model->html; ?>
</div>
