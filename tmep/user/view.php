<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);
?>
<h1>View User #<?php echo $model->id; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List User',array('index')); ?></li>
	<li><?php echo CHtml::link('Create User',array('create')); ?></li>
	<li><?php echo CHtml::link('Update User',array('update','id'=>$model->id)); ?></li>
	<li><?php echo CHtml::linkButton('Delete User',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage User',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'password',
		'last_login_time',
		'registration_time',
	),
)); ?>
