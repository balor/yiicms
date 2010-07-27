<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('cms')->assets; ?>/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('cms')->assets; ?>/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('cms')->assets; ?>/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('cms')->assets; ?>/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('cms')->assets; ?>/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php echo Yii::app()->getModule('cms')->getControlBox('/site/logout'); ?>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
    
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Panel administracyjny', 'url'=>array('/cms/default/index')),
				array('label'=>'Zawartość', 'url'=>array('/cms/content/admin')),
				array('label'=>'Taksonomia', 'url'=>array('/cms/taksonomy/admin')),
				array('label'=>'Galerie', 'url'=>array('/cms/gallery/admin')),
				array('label'=>'Użytkownicy', 'url'=>array('/user/admin')),
			),
		)); ?>
	</div>

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by MadCowCreations.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
