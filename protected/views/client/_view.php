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

	<b><?php echo CHtml::encode($data->getAttributeLabel('tell')); ?>:</b>
	<?php echo CHtml::encode($data->tell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PassportNumber')); ?>:</b>
	<?php echo CHtml::encode($data->PassportNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RoomlId')); ?>:</b>
	<?php echo CHtml::encode($data->RoomlId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardType')); ?>:</b>
	<?php echo CHtml::encode($data->CreditCardType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardExpiryDate')); ?>:</b>
	<?php echo CHtml::encode($data->CreditCardExpiryDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardHolderName')); ?>:</b>
	<?php echo CHtml::encode($data->CreditCardHolderName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardSecurityNumber')); ?>:</b>
	<?php echo CHtml::encode($data->CreditCardSecurityNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardNumber')); ?>:</b>
	<?php echo CHtml::encode($data->CreditCardNumber); ?>
	<br />

	*/ ?>

</div>