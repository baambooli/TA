<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('Username')); ?>:</b>
    <?php echo CHtml::encode($data->Name); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Family')); ?>:</b>
	<?php echo CHtml::encode($data->Family); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('CountryId')); ?>:</b>
    <?php echo CHtml::encode($data->getCountryName($data->CountryId)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('BirthDay')); ?>:</b>
    <?php echo CHtml::encode($data->BirthDay); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
    <?php echo CHtml::encode($data->Sex ? 'Female' : 'Male'); ?>
    <br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('tell')); ?>:</b>
	<?php echo CHtml::encode($data->tell); ?>
	<br />

    <?php 
        // read global variable from /protected/config/main.php file
        $key = Yii::app()->params['key'];
    ?>
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('PassportNumber')); ?>:</b>
	<?php echo CHtml::encode(AES::aes256Decrypt($key,$data->PassportNumber)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardType')); ?>:</b>
	<?php echo CHtml::encode(AES::aes256Decrypt($key,$data->CreditCardType)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardExpiryDate')); ?>:</b>
	<?php echo CHtml::encode(AES::aes256Decrypt($key,$data->CreditCardExpiryDate)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardHolderName')); ?>:</b>
	<?php echo CHtml::encode(AES::aes256Decrypt($key,$data->CreditCardHolderName)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardSecurityNumber')); ?>:</b>
	<?php echo CHtml::encode(AES::aes256Decrypt($key,$data->CreditCardSecurityNumber)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreditCardNumber')); ?>:</b>
	<?php echo CHtml::encode(AES::aes256Decrypt($key,$data->CreditCardNumber)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Image')); ?>:</b>
    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/client/'.$data->Image,'Image',array('width'=>200)); ?>  
    <br />

</div>