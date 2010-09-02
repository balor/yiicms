<?php
$this->pageTitle=Yii::app()->name . ' - Example 2';
$this->breadcrumbs=array(
	'Example 2',
);
?>

<div style="float:left;width:200px;border-right:#ccc 1px solid;padding: 15px 0px;">
<?php
// Example of using CSimpleGalleryWidget to render gallery
$this->widget(
    'application.modules.cms.extensions.jLeftMenu.CJLeftMenuWidget', 
    array(
        'taksonomy_id'=>5,
        'content_action'=>array('/site/page', 'view'=>'example_taksonomy'),
        //'clickable_cats'=>true,
        //'category_action'=>array('/site/page', 'view'=>'example_taksonomy'),
    )
);
?>
</div>

<div style="float:right;width:670px;">
<?php
if (!isset($_GET['content_id']))
    $content_id = 2;
else
    $content_id = $_GET['content_id'];

$this->widget(
    'application.modules.cms.extensions.simpleContentRenderer.CSimpleContentRendererWidget', 
    array(
        'content_id'=>2,
        'header_tag'=>'h2',
        'print_author'=>false,
    )
);
?>
</div>

<div style="clear:both;"></div>
