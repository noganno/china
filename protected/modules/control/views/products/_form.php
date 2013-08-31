<?php
/* @var $this ContentController */
/* @var $model Content */
/* @var $form CActiveForm */

?>

<div class="form">
    <p class="success">
        <?php if(Yii::app()->user->hasFlash('success')):
            echo Yii::app()->user->getFlash('success');
        endif; ?>
    </p>
    <?php
   // CVarDumper::dump($_POST, 10, true);
    ?>
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
        <? echo $this->assortiment_image($model->id, $model->title, '100','my') ;

        if(file_exists($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.'/uploads/'.$model->id.'_assortiment.jpg')) {
            echo '<div class="row">';
            echo $form->labelEx($model,'del_img');
            echo $form->checkBox($model,'del_img' );
            echo '</div>';
        }
        ?>
        <? echo '<br />' ?>

        <?php echo CHtml::activeFileField($model, 'icon'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'introtext'); ?>
        <?php
        $this->widget('ext.fckeditor.FCKEditorWidget', array(
                "model"=>$model,
                "attribute"=>'introtext',
                "height"=>'400px',
                "width"=>'100%',
                "toolbarSet"=>'Default',
                "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                "config" => array(
                    "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
            )
        );
        ?>
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
        <?php echo $form->labelEx($model,'sku'); ?>
        <?php echo $form->textField($model,'sku',array('size'=>80,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'sku'); ?>
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
		<?php echo $form->labelEx($model,'brand_id'); ?>
		<?php echo $form->dropDownList($model,'brand_id', Brands::getAllCategories()); ?>
		<?php echo $form->error($model,'brand_id'); ?>
	</div>
	<div class="row">
        <?php

        $types = Types::model()->findAll(array('order' => 'title'));
        if($model->id) {
            $type_current = TypeProduct::model()->getTypeProduct($model->id);
        }
        $list = CHtml::listData($types, 'type_id', 'title');

        echo $form->labelEx($model,'type_id');
        echo CHtml::dropDownList('types', $type_current,$list,array('empty' => 'Выберите тип'));
        ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'created'); ?>
        <?php echo $form->textField($model,'created',array('size'=>80,'maxlength'=>128, 'value' => date('j-m-Y H:i',time()))); ?>
        <?php echo $form->error($model,'created'); ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'btn btn-inverse')); ?>
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->