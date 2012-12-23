<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'seat-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'SeatNumber',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'SeatType',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'AirplaneSpecId',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
            'id'=>'save_update',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<script>

// jQuery function to change the caption of key after click
$('#save_update').click(function() {
    $('#save_update').html('Saving, Please wait ....');
});
</script>