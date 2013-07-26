<div class="quip">
<?php if(Yii::app()->user->hasFlash('success')):
        echo '<p class="success">'.Yii::app()->user->getFlash('success').'</p>'; 
endif; ?>
    <h3>Комментарии(<?php
    		$i=0; 
    		foreach ($comments as $value) {
    			$i++;
    		}
    		echo $i;
    ?>)</h3>	

<ol class="quip-comment-list">

<?php foreach ($comments as $value):?>

<li class="quip-comment" id="qcom14" >
<div id="qcom14-div" class="quip-comment-body">
    <div class="quip-comment-right">
        <img src="http://www.gravatar.com/avatar/<?=md5( strtolower( trim($value['user_email'])))?>?d=identicon&f=n" class="quip-avatar" alt="Создание сайтов и интернет магазинов" width="48" height="48"/>
    </div>

    <p class="quip-comment-meta">
        <span class="quip-comment-author"><?=CHtml::encode($value['user_name']); ?>:</span><br />
        <span class="quip-comment-createdon"><?=CHtml::encode(date('j-m-Y H:i', $value['created'])); ?></a></span>
    </p>

    <div class="quip-comment-text">
        <p><?=CHtml::encode($value['content'])?></p>
    </div>
</div>
    
</li>
<?php endforeach;?>

</ol>
</div>

<span id="add-comment-ico"><a rel="nofollow" id="show-add-comment-form" href="javascript://">Комментировать</a></span>
<div id="add-comment">

<?php 

	$model = Comments::model();
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'comments-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'action'=>'/site/addcomment',
	)); 

?>

	<p class="note"><span class="required">*</span> Поля обязательны для заполнения</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->hiddenField($model,'redirect', array('value' => $uri)); ?>
	<?php echo $form->hiddenField($model,'material_id', array('value' => $id)); ?>
	<div class="row">
		<p><?php echo $form->labelEx($model,'user_name'); ?></p>
		<?php echo $form->textField($model,'user_name'); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<p><?php echo $form->labelEx($model,'user_email'); ?></p>
		<?php echo $form->textField($model,'user_email'); ?>
		<?php echo $form->error($model,'user_email'); ?>
	</div>

	<div class="row">
		<p><?php echo $form->labelEx($model,'user_website'); ?></p>
		<?php echo $form->textField($model,'user_website'); ?>
		<?php echo $form->error($model,'user_website'); ?>
	</div>

	<div class="row">
		<p><?php echo $form->labelEx($model,'content'); ?></p>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Добавить комментарий'); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>

