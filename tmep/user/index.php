<?php
$this->breadcrumbs=array(
	'Users',
);
?>

<h1>List User</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create User',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage User',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
