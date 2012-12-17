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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tell')); ?>:</b>
	<?php echo CHtml::encode($data->Tell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PassportNumber')); ?>:</b>
	<?php echo CHtml::encode($data->PassportNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Username')); ?>:</b>
	<?php echo CHtml::encode($data->Username); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Passoword')); ?>:</b>
	<?php echo CHtml::encode($data->Passoword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCradType')); ?>:</b>
	<?php echo CHtml::encode($data->CreditCradType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardNumber')); ?>:</b>
	<?php echo CHtml::encode($data->CreditCardNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardSecurityNumber')); ?>:</b>
	<?php echo CHtml::encode($data->CreditCardSecurityNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PassportExpiry')); ?>:</b>
	<?php echo CHtml::encode($data->PassportExpiry); ?>
	<br />

	*/ ?>

</div>