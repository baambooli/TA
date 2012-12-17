<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DestinationId')); ?>:</b>
	<?php echo CHtml::encode($data->DestinationId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepartureId')); ?>:</b>
	<?php echo CHtml::encode($data->DepartureId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FlightNumber')); ?>:</b>
	<?php echo CHtml::encode($data->FlightNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AirlineName')); ?>:</b>
	<?php echo CHtml::encode($data->AirlineName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FlightDate')); ?>:</b>
	<?php echo CHtml::encode($data->FlightDate); ?>
	<br />


</div>