<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'room-client-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'RoomId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ClientId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'OccupationDate',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>