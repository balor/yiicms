<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	'Zarządzanie taksonomią strony'=>array('/cms/taksonomy/admin'),
	$model->name,
);

$this->menu=array(
//	array('label'=>'List Taksonomy', 'url'=>array('index')),
	array('label'=>'Stwórz nową kategorię', 'url'=>array('create')),
	array('label'=>'Edytuj kategorię', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Usuń kategorię', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Jesteś pewny że chcesz skasować tę kategorię?')),
	array('label'=>'Zarządzaj taksonomią', 'url'=>array('admin')),
);
?>

<h1>Kategoria "<?php echo $model->name; ?>"</h1>

<?php $this->renderPartial('_view', array('data'=>$model,'parent'=>$parent)); ?>
<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'parent_id',
	),
));*/ ?>
