<?php
$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'Example',
);
$content = Yii::app()->getModule('cms')->getContent(2);
?>

<h1><?php echo $content['name']; ?></h1>

<?php echo $content['html']; ?>

<div style="border:1px solid #999;padding:5px;margin:10px 0px;">
Tekst napisany przez <?php echo $content['author']; ?> dnia <?php echo date("Y.m.d", $content['created']); ?>.<br />
Ostatnia aktualizacja odbyła się <?php echo date("Y.m.d H:i", $content['modified']); ?>.<br />
</div>
