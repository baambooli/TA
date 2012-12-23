<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FlightNumber')); ?>:</b>
	<?php echo CHtml::encode($data->FlightNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AirlineId')); ?>:</b>
	<?php echo CHtml::encode($data->AirlineId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AirplaneId')); ?>:</b>
	<?php echo CHtml::encode($data->AirplaneId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TakeoffDate')); ?>:</b>
	<?php echo CHtml::encode($data->TakeoffDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LandingDate')); ?>:</b>
	<?php echo CHtml::encode($data->LandingDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepartureAirportId')); ?>:</b>
	<?php echo CHtml::encode($data->DepartureAirportId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('DestinationAirportId')); ?>:</b>
	<?php echo CHtml::encode($data->DestinationAirportId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PriceOfFirstClassSeats')); ?>:</b>
	<?php echo CHtml::encode($data->PriceOfFirstClassSeats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PriceOfBusinessClassSeats')); ?>:</b>
	<?php echo CHtml::encode($data->PriceOfBusinessClassSeats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PriceOfEconomyClassSeats')); ?>:</b>
	<?php echo CHtml::encode($data->PriceOfEconomyClassSeats); ?>
	<br />

	*/ ?>

</div>