<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Category')); ?>:</b>
	<?php echo CHtml::encode($data->Category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PricePerDay')); ?>:</b>
	<?php echo CHtml::encode($data->PricePerDay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityId')); ?>:</b>
	<?php echo CHtml::encode($data->CityId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoomId')); ?>:</b>
	<?php echo CHtml::encode($data->RoomId); ?>
	<br />


</div>