<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'air-plane-specification-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'Type',$model->getTypes(), array('class'=>'span5')); ?> 

	<?php echo $form->textFieldRow($model,'NoOfFirstClassSeats',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NoOfBusinessClassSeats',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NoOfEconomyClassSeats',array('class'=>'span5')); ?>

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