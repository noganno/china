<?php
/* @var $this ContentController */
/* @var $model Content */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data')
));
    ?>


	<p class="note"> <span class="required">*</span> Поля обязательные для заполнения</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>120,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->textField($model,'img',array('size'=>120,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'img'); ?>
        <input type="file" id="image" name="image" accept="image/*" multiple>
        <div class="preview"></div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'introtext'); ?>
		<?php echo $form->textArea($model,'introtext',array('size'=>120,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'introtext'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'price'); ?>
        <?php echo $form->textField($model,'price',array('size'=>80,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'price'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'count'); ?>
        <?php echo $form->textField($model,'count',array('size'=>80,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'count'); ?>
    </div>

	<div class="row">
		<?php echo $form->hiddenField($model,'alias',array('size'=>120,'maxlength'=>255, 'value' => '1111111')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status', array(0 => "Не опубликована", 1 => "Опубликована")); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id', CategoryProducts::getAllCategories()); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->dateField($model,'created', array(
			'value' => $model->created?date('j-m-Y H:i',$model->created):date('j-m-Y H:i',time()),
		)); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-inverse')); ?>
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->