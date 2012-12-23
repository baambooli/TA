<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SeatNumber')); ?>:</b>
	<?php echo CHtml::encode($data->SeatNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SeatType')); ?>:</b>
	<?php echo CHtml::encode($data->SeatType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AirplaneSpecId')); ?>:</b>
	<?php echo CHtml::encode($data->AirplaneSpecId); ?>
	<br />


</div>