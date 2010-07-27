<?php
$this->breadcrumbs=array(
	'Zasoby'=>array('index'),
	$model->id,
);
$assdir = Yii::app()->getModule('cms')->assets;

$this->menu=array(
//	array('label'=>'List Content', 'url'=>array('index')),
	array('label'=>'Utwórz zasób', 'url'=>array('create')),
	array('label'=>'Edytuj zasób', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Skasuj zasób', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Czy na pewno skasować ten zasób?')),
	array('label'=>'Zarządzaj zasobami', 'url'=>array('admin')),
);
?>

<h1>Podgląd zasobu z pola: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'author',
        array(
            'name'=>'created',
            'value'=>date("Y.m.d H:i:s", $model->created),
        ),
        array(
            'name'=>'modified',
            'value'=>date("Y.m.d H:i:s", $model->modified),
        ),
	),
)); ?>
<br />

<h3>Taksonomia:</h3>

<?php echo CHtml::link(
    CHtml::image($assdir.'/add.png').' Przyporządkuj do kategorii', array(
    'taksonomyLinker/create',
    'content_id'=>$model->id,
    'content_model'=>'Content'
), array(
    'class'=>'add_link'
)); ?>

<br /><br />
<strong>Należy do kategorii:</strong>
<ul>
<?php
$taksonomyLinks = $model->getContaingingCategories();
if (!$taksonomyLinks || empty($taksonomyLinks)) {
    echo 'Ten zasób nie został jeszcze przyporządkowany do żadnej kategorii.';
}
else {
    foreach ($taksonomyLinks as $link) {
        print '<li>'.
            CHtml::link($link->getCategory()->name, array('/cms/taksonomy/view', 'id'=>$link->getCategory()->id)).' '.
            CHtml::linkButton(CHtml::image($assdir.'/delete.png', 'Usuń przyporządkowanie'),
                array(
                    'submit'=>array('taksonomyLinker/delete', 'id'=>$link->id),
                    'confirm'=>'Czy na pewno chcesz usunąć przyporządkowanie z kategorią '.$link->getCategory()->name.'?',
            )).'</li>';
    }
}
?>
</ul>

<h3>Podgląd:</h3>
<div id="content_preview">
    <?php echo $model->html; ?>
</div>
