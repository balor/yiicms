<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update User <?php echo $model->id; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List User',array('index')); ?></li>
	<li><?php echo CHtml::link('Create User',array('create')); ?></li>
	<li><?php echo CHtml::link('View User',array('view','id'=>$model->id)); ?></li>
	<li><?php echo CHtml::link('Manage User',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>