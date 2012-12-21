<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Family')); ?>:</b>
	<?php echo CHtml::encode($data->Family); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PassportNumber')); ?>:</b>
	<?php echo CHtml::encode($data->PassportNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PassportExpirey')); ?>:</b>
	<?php echo CHtml::encode($data->PassportExpirey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nationality')); ?>:</b>
	<?php echo CHtml::encode($data->Nationality); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Tell')); ?>:</b>
	<?php echo CHtml::encode($data->Tell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FlightId')); ?>:</b>
	<?php echo CHtml::encode($data->FlightId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SeatId')); ?>:</b>
	<?php echo CHtml::encode($data->SeatId); ?>
	<br />

	*/ ?>

</div>