<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);
?>
<h1>Create User</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List User',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage User',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>