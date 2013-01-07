<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'search4-empty-room-view-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'RoomId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RoomNumber',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'HotelName',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'HotelCategory',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'HotelTel',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'CityName',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'RoomType',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'PricePerDay',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'CheckinDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CheckoutDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RoomStatus',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'HotelAddress',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'HotelImage',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'RoomCapacity',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'HotelId',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
            'id'=>'save_update',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
