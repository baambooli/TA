<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Family',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Address',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'PassportNumber',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'PassportExpirey',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CountryId',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Tell',array('class'=>'span5','maxlength'=>20)); ?>

    <?php echo $form->dropDownListRow($model,'FlightId',$model->getFlights(), array('class'=>'span5')); ?> 

	<?php echo $form->textFieldRow($model,'SeatId',array('class'=>'span5','maxlength'=>25)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
