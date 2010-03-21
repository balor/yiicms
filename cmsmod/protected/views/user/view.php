<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View user <?php echo $model->email; ?></h1>

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
