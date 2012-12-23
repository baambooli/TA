<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'flight-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'FlightNumber',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'AirlineId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'AirplaneId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'TakeoffDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LandingDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DepartureAirportId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DestinationAirportId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PriceOfFirstClassSeats',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PriceOfBusinessClassSeats',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PriceOfEconomyClassSeats',array('class'=>'span5')); ?>

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
