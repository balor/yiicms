<?php
$this->breadcrumbs=array(
	'Panel administracyjny',
);
$assdir = Yii::app()->getModule('cms')->assets;
?>
<h1>Panel administracyjny</h1>
<ul class="main_links_list">
    <li>
        <?php echo CHtml::image($assdir.'/edit.png',
            array('alt' => 'Zarządzaj zawartością strony')); ?>
        <?php echo CHtml::link('Zarządzaj zawartością strony',
            $this->createUrl('/cms/content/admin'),
            array('class'=>'main_link'));?>
    </li>
    <li>
        <?php echo CHtml::image($assdir.'/edit.png',
            array('alt' => 'Zarządzaj galeriami')); ?>
        <?php echo CHtml::link('Zarządzaj galeriami',
            $this->createUrl('/cms/gallery/admin'),
            array('class'=>'main_link'));?>
    </li>
    <li>
        <?php echo CHtml::image($assdir.'/users.png',
            array('alt' => 'Zarządzaj użytkownikami')); ?>
        <?php echo CHtml::link('Zarządzaj użytkownikami',
            $this->createUrl('/user/admin'),
            array('class'=>'main_link'));?>
    </li>
</ul>
