<?php
$this->breadcrumbs=array(
	'Zarządzaj użytkownikami'=>array('index'),
	$model->email,
);

$this->menu=array(
	array('label'=>'Dodaj użytkownika', 'url'=>array('create')),
	array('label'=>'Edytuj użytkownika', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Usuń użytkownika', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Czy na pewno usunąć tego użytkownika?')),
	array('label'=>'Zarządzaj użytkownikami', 'url'=>array('admin')),
);
?>

<h1>Dane użytkownika <?php echo $model->email; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
        array(
            'name'=>'last_login_time',
            'value'=>date("Y.m.d H:i:s", $model->last_login_time),
        ),
        array(
            'name'=>'registration_time',
            'value'=>date("Y.m.d H:i:s", $model->registration_time),
        ),
	),
)); ?>
