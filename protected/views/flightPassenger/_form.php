<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'flight-passenger-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Family',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Address',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'PassportNumber',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'PassportExpirey',array('class'=>'span5')); ?>

    <?php echo $form->dropDownListRow($model,'CountryId',$model->getCountries(), array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Tell',array('class'=>'span5','maxlength'=>20)); ?>

    <?php echo $form->dropDownListRow($model,'FlightId',$model->getFlights(), array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SeatId',array('class'=>'span5','maxlength'=>25)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
