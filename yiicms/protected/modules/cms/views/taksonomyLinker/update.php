<?php
$this->breadcrumbs=array(
	'Taksonomy Linkers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TaksonomyLinker', 'url'=>array('index')),
	array('label'=>'Create TaksonomyLinker', 'url'=>array('create')),
	array('label'=>'View TaksonomyLinker', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TaksonomyLinker', 'url'=>array('admin')),
);
?>

<h1>Update TaksonomyLinker <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>