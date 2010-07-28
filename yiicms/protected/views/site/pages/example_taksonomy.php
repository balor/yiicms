<?php
$this->pageTitle=Yii::app()->name . ' - Example 2';
$this->breadcrumbs=array(
	'Example 2',
);
?>

<?php
// Example of manual content distribution
//Yii::app()->getModule('cms')->getContent(2, array('render'=>true, 'header_tag'=>'h2'));
?>

<?php
// Example of using CSimpleGalleryWidget to render gallery
$this->widget(
    'application.modules.cms.extensions.jLeftMenu.CJLeftMenuWidget', 
    array(
        'taksonomy_id'=>5,
    )
);
?>

