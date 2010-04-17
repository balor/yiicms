<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-image-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gallery_folder_id'); ?>
		<?php echo $form->textField($model,'gallery_folder_id'); ?>
		<?php echo $form->error($model,'gallery_folder_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_dimensions'); ?>
		<?php echo $form->textField($model,'image_dimensions',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'image_dimensions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_size'); ?>
		<?php echo $form->textField($model,'image_size'); ?>
		<?php echo $form->error($model,'image_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_filename'); ?>
		<?php echo $form->textField($model,'image_filename',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image_filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->