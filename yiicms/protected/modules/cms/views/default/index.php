<?php
$this->breadcrumbs=array(
	'Panel administracyjny',
);
$assdir = Yii::app()->getModule('cms')->assets;
?>
<h1>Panel administracyjny</h1>
<ul class="main_links_list">
<?php if (Yii::app()->getModule('cms')->submoduleLoaded('content')) { ?>
    <li>
        <?php echo CHtml::image($assdir.'/edit.png','Zarządzaj zawartością strony'); ?>
        <?php echo CHtml::link('Zarządzaj zawartością strony',
            $this->createUrl('/cms/content/admin'),
            array('class'=>'main_link'));?>
    </li>
<?php } ?>
<?php if (Yii::app()->getModule('cms')->submoduleLoaded('taksonomy')) { ?>
    <li>
        <?php echo CHtml::image($assdir.'/folder_page.png','Zarządzaj taksonomią'); ?>
        <?php echo CHtml::link('Zarządzaj taksonomią',
            $this->createUrl('/cms/taksonomy/admin'),
            array('class'=>'main_link'));?>
    </li>
<?php } ?>
<?php if (Yii::app()->getModule('cms')->submoduleLoaded('gallery')) { ?>
    <li>
        <?php echo CHtml::image($assdir.'/image.png','Zarządzaj galeriami'); ?>
        <?php echo CHtml::link('Zarządzaj galeriami',
            $this->createUrl('/cms/gallery/admin'),
            array('class'=>'main_link'));?>
    </li>
<?php } ?>
    <li>
        <?php echo CHtml::image($assdir.'/users.png','Zarządzaj użytkownikami'); ?>
        <?php echo CHtml::link('Zarządzaj użytkownikami',
            $this->createUrl('/user/admin'),
            array('class'=>'main_link'));?>
    </li>
</ul>
