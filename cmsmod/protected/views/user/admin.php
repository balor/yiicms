<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj użytkownikami</h1>

<?php echo CHtml::link('Zaawansowane wyszukiwanie','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'email',
        array(
		    'name'=>'last_login_time',
            'value'=>'date("Y.m.d H:i:s",$data->last_login_time)'
            ),
        array(
		    'name'=>'registration_time',
            'value'=>'date("Y.m.d H:i:s",$data->registration_time)'
            ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
