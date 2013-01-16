<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'SeatId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SeatNumber',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'SeatType',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'Aireplane_specificationsName',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'AirplaneName',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'AirlineName',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'AirlineCountry',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'AirlineTel',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'FlightNumber',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'FlightId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'TakeoffTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'TakeoffDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LandingTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LandingDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DestinationCityName',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'DestinationAirportName',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'DestinationAirportAddress',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'DestinationAirportTel',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'DepartureCityName',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'DepartureAirportName',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'DepartureAirportAddress',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'DepartureAirportTel',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'FlightClientId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ClientName',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'ClientFamily',array('class'=>'span5','maxlength'=>70)); ?>

	<?php echo $form->textFieldRow($model,'ClientSex',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'PassportNumber',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Username',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'AireplaneSpecificationType',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
