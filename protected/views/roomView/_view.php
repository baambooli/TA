<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HotelName')); ?>:</b>
	<?php echo CHtml::encode($data->HotelName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoomTypeName')); ?>:</b>
	<?php echo CHtml::encode($data->RoomTypeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoomNumber')); ?>:</b>
	<?php echo CHtml::encode($data->RoomNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tell')); ?>:</b>
	<?php echo CHtml::encode($data->Tell); ?>
	<br />


</div>