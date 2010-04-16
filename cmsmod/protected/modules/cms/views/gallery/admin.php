<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	'Zarządzanie galeriami',
);

$this->menu=array(
//	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Utwórz galerię', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gallery-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj galeriami</h1>

<?php echo CHtml::link('Zaawansowane wyszukiwanie','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'icon_path',
        array(
            'name'=>'created',
            'value'=>'date("Y.m.d H:i:s", $data->created)',
        ),
		array(
            'header'=>'Operacje',
			'class'=>'CButtonColumn',
		),
	),
)); ?>
