<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'flight-client-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ClientId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'FlightId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SeatId',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
