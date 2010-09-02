<?php
$this->breadcrumbs=array(
	'Taksonomy Linkers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TaksonomyLinker', 'url'=>array('index')),
	array('label'=>'Create TaksonomyLinker', 'url'=>array('create')),
	array('label'=>'Update TaksonomyLinker', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TaksonomyLinker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
	array('label'=>'Manage TaksonomyLinker', 'url'=>array('admin')),
);
?>

<h1>View TaksonomyLinker #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'taksonomy_id',
		'content_id',
	),
)); ?>
