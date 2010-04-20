<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'Example',
);
?>

<?php // Example of CMS usage (module CONTENT and GALLERY) ?>

<?php
Yii::app()->getModule('cms')->getContent(2, 'content', array('render'=>true, 'header_tag'=>'h2'));
?>

<?php
$this->widget(
    'application.modules.cms.extensions.simpleGallery.CSimpleGalleryWidget', 
    array(
        'gallery_id'=>1,
        'header_tag'=>'h3',
        'gallery_container_id'=>'my_gallery',
        'current_page'=>array('/site/page',array('view'=>'about')),
        'folders'=>array(
            'in_row'=>1,
        ),
        'images'=>array(
            'in_row'=>3,
        ),
    )
);
?>

