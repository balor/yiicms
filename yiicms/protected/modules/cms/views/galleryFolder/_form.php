<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-folder-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
        <?php
        if (!$model->isNewRecord)
            echo '<span style="font-style:italic;">Pozostaw puste aby zatrzymać obecną ikonę kategorii.</span><br />';
        ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row buttons">
        <?php echo CHtml::hiddenField("gal", $gallery->id); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Stwórz' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
