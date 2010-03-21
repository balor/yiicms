<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->labelEx($model,'html'); ?>
		<?php /*echo $form->textArea($model,'html',array('rows'=>6, 'cols'=>50));*/ ?>
<?php
    $this->widget('application.modules.cms.extensions.tinymce.ETinyMce',
        array(
            'model'=>$model,
            'attribute'=>'html',
            'height'=>'200px',
            'language'=>'pl',
            'switchLabels'=>array('Przełącz na do trybu edycji HTML', 'Przełącz do trybu edytora wizualnego')
            )
        );
?> 
		<?php echo $form->error($model,'html'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
