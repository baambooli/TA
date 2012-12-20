<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoOfFirstClassSeats')); ?>:</b>
	<?php echo CHtml::encode($data->NoOfFirstClassSeats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoOfBusinessClassSeats')); ?>:</b>
	<?php echo CHtml::encode($data->NoOfBusinessClassSeats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoOfEconomyClassSeats')); ?>:</b>
	<?php echo CHtml::encode($data->NoOfEconomyClassSeats); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PriceOfBusinessClassSeats')); ?>:</b>
	<?php echo CHtml::encode($data->PriceOfBusinessClassSeats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PriceOfEconomyClassSeats')); ?>:</b>
	<?php echo CHtml::encode($data->PriceOfEconomyClassSeats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AirplaneId')); ?>:</b>
	<?php echo CHtml::encode($data->AirplaneId); ?>
	<br />

	*/ ?>

</div>