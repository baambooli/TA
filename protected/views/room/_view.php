<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HotelId')); ?>:</b>
	<?php echo CHtml::encode($data->getHotelName($data->HotelId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoomNumber')); ?>:</b>
	<?php echo CHtml::encode($data->RoomNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoomTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->getRoomTypeName($data->RoomTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tell')); ?>:</b>
	<?php echo CHtml::encode($data->Tell); ?>
	<br />


</div>