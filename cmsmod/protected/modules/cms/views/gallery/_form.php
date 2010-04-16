<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
    'enableAjaxValidation'=>false,
    'enctype'=>'multipart/form-data',
)); ?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'icon_path'); ?>
		<?php echo $form->textField($model,'icon_path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'icon_path'); ?>
	</div>
    <div class="row">
        <?php
        if ($action == "update")
            echo "<strong>Pozostaw puste pole by zachować obecną ikonę.</strong><br />";
        ?>
        Obłsugiwane formaty obrazków: jpg, gif, png.
        <br />
        <?php echo CHtml::activeLabelEx($model,'image'); ?>
        <?php echo CHtml::activeFileField($model, 'image'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Utwórz' : 'Zapisz'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
