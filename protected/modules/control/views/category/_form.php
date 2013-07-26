<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> <span class="required">*</span> Поля обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias_cat'); ?>
		<?php echo $form->textField($model,'alias_cat',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alias_cat'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-inverse')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->