<?php
$this->pageTitle=Yii::app()->name . ' - Example 1';
$this->breadcrumbs=array(
	'Example 1',
);
?>

<?php
// Example of using CSimpleContentRendererWidget
$this->widget(
    'application.modules.cms.extensions.simpleContentRenderer.CSimpleContentRendererWidget', 
    array(
        'content_id'=>2,
        'header_tag'=>'h2',
        'print_author'=>false,
    )
);
?>

<?php
// Example of using CSimpleGalleryWidget to render gallery
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

