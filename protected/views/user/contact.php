<?php
/* @var $this UserController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Отправить сообщение';
$this->breadcrumbs = array(
    'Contact',
);
?>

<section class="registration_block">
    <h3>Отправить сообщение</h3>

    <div class="registration">
        <?php if (Yii::app()->user->hasFlash('contact')): ?>

            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('contact'); ?>
            </div>

        <?php else: ?>

            <div class="form">

                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'feedbackForm',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                )); ?>

                <p class="note"><span class="required">*</span> Обязательные для заполнения поля.</p>

                <?php echo $form->errorSummary($model); ?>

                <table>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'name'); ?>
                            <?php echo $form->textField($model, 'name'); ?>
                            <?php echo $form->error($model, 'name'); ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'email'); ?>
                            <?php echo $form->textField($model, 'email'); ?>
                            <?php echo $form->error($model, 'email'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'subject'); ?>
                            <?php echo $form->textField($model, 'subject', array('size' => 45, 'maxlength' => 128)); ?>
                            <?php echo $form->error($model, 'subject'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'body'); ?>
                            <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 51)); ?>
                            <?php echo $form->error($model, 'body'); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php $this->widget('CCaptcha'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $form->textField($model, 'verifyCode'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo CHtml::submitButton('Отправить'); ?>
                        </td>
                    </tr>

                </table>


                <?php $this->endWidget(); ?>

            </div><!-- form -->

        <?php endif; ?>
    </div>
</section>