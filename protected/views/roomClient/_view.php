<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoomId')); ?>:</b>
	<?php echo CHtml::encode($data->RoomId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ClientId')); ?>:</b>
	<?php echo CHtml::encode($data->ClientId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OccupationDate')); ?>:</b>
	<?php echo CHtml::encode($data->OccupationDate); ?>
	<br />


</div>