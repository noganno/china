<?php
/* @var $this SettingsController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Обязательные для заполнения поля</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'option_name'); ?>
		<?php echo $form->textField($model,'option_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'option_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'option_value'); ?>
		<?php echo $form->textArea($model,'option_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'option_value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-inverse')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->