<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	'Zarządzanie taksonomią',
);

$this->menu=array(
//	array('label'=>'List Taksonomy', 'url'=>array('index')),
	array('label'=>'Utwórz kategorię', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('taksonomy-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj taksonomią</h1>

<?php echo CHtml::link('Zaawansowane wyszukwianie','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'taksonomy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'parent_id',
		array(
            'header'=>'Operacje',
			'class'=>'CButtonColumn',
            'deleteConfirmation'=>'Czy na pewno skasować tę kategorię?',
		),
	),
)); ?>
