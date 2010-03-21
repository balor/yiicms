<?php
$this->pageTitle=Yii::app()->name . ' - Rejestracja';
$this->breadcrumbs=array(
	'Rejestracja',
);
?>

<h2>Rejestracja</h2>

<div class="form">

<?php echo CHtml::beginForm($this->createUrl('user/register')); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="row">
<?php echo CHtml::activeLabelEx($model,'email'); ?>
<?php echo CHtml::activeTextField($model,'email',array('size'=>30,'maxlength'=>124)); ?>
</div>
<div class="row">
<?php echo CHtml::activeLabelEx($model,'password'); ?>
<?php echo CHtml::activePasswordField($model,'password',array('size'=>30,'maxlength'=>124)); ?>
</div>
<div class="row">
<?php echo CHtml::activeLabelEx($model,'password_rep'); ?>
<?php echo CHtml::activePasswordField($model,'password_rep',array('size'=>30,'maxlength'=>124)); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton('Zarejestruj się'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->
