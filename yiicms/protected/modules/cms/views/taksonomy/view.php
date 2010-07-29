<?php
$this->breadcrumbs=array(
	'Panel administracyjny'=>array('/cms/default/index'),
	'Zarządzanie taksonomią strony'=>array('/cms/taksonomy/admin'),
	'Kategoria '.$model->name,
);

$assdir = Yii::app()->getModule('cms')->assets;

$this->menu=array(
//	array('label'=>'List Taksonomy', 'url'=>array('index')),
	array('label'=>'Stwórz nową kategorię', 'url'=>array('create')),
	array('label'=>'Edytuj kategorię', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Usuń kategorię', 'url'=>'#', 'linkOptions'=>array(
        'submit'=>array('delete','id'=>$model->id),
        'confirm'=>'Jesteś pewny że chcesz skasować tę kategorię?')),
	array('label'=>'Zarządzaj taksonomią', 'url'=>array('admin')),
);
?>

<h1>Kategoria "<?php echo $model->name; ?>"</h1>
<?php $this->renderPartial('_view', array('data'=>$model)); ?>

<br />
<h3>Zawartości należące do tej kategorii</h3>
<ul>
<?php
$taksonomyLinkers = $model->getLinkers();
foreach ($taksonomyLinkers as $link) {
    $c = $link->content;
    print '<li>'.

        CHtml::link($c->name, array(
            '/cms/content/view',
            'id'=>$link->content_id
        )).' '.
            
        CHtml::linkButton(CHtml::image($assdir.'/delete.png', 'Usuń przyporządkowanie'), array(
            'submit'=>array('taksonomyLinker/delete', 'id'=>$link->id),
            'confirm'=>'Czy na pewno chcesz usunąć to przyporządkowanie z zawartością '.$c->name.'?',
        )).

        '</li>';
}
if (empty($taksonomyLinkers))
    echo 'Do tej kategorii nie został jeszcze przyporządkowany żaden zasób.<br />'.
    'Przejdź do danego zasobu aby przyporządkować go do kategorii.';
?>
</ul>
