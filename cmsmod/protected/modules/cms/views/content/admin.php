<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	'Zarządzanie zarartością',
);

$this->menu=array(
//	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Utwórz zasób', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('content-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj zasobami strony</h1>
<?php echo CHtml::link('Zaawansowane wyszukiwanie','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'content-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        'name',
		'author',
        array(
            'name'=>'created',
            'value'=>'date("Y.m.d H:i:s", $data->created)',
        ),
        array(
            'name'=>'modified',
            'value'=>'date("Y.m.d H:i:s", $data->modified)',
        ),
		array(
            'header'=>'Operacje',
			'class'=>'CButtonColumn',
            'deleteConfirmation'=>'Czy na pewno skasować ten zasób?',
		),
	),
)); ?>
