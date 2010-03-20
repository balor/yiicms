<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);
?>
<h1>Manage Users</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List User',array('index')); ?></li>
	<li><?php echo CHtml::link('Create User',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'email',
		'password',
		'last_login_time',
		'registration_time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
