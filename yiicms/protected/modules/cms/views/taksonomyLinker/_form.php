<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'taksonomy-linker-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'taksonomy_id'); ?>
        <?php echo CHtml::activeDropDownList($model,'taksonomy_id',$model->getAllCategories()); ?>
		<?php echo $form->error($model,'taksonomy_id'); ?>
	</div>

	<div class="row">
        <strong>Zawartość:</strong> <?php echo $model->content->name; ?>
        <?php echo CHtml::activeHiddenField($model, 'content_id', array('value'=>$model->content->id)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
