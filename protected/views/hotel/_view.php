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

    <b><?php echo CHtml::encode($data->getAttributeLabel('CityId')); ?>:</b>
    <?php echo CHtml::encode($data->getCityName($data->CityId)); ?>
    <br /> 
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('Tel')); ?>:</b>
    <?php echo CHtml::encode($data->Tel); ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('Fax')); ?>:</b>
    <?php echo CHtml::encode($data->Fax); ?>
    <br /> 
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
    <?php echo CHtml::encode($data->Address); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('URL')); ?>:</b>
    <?php echo CHtml::encode($data->URL); ?>
    <br /> 
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
    <?php echo CHtml::encode($data->Email); ?>
    <br /> <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('Image')); ?>:</b>
    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/hotel/'.$data->Image,'Image',array('width'=>200)); ?>  
    <br />
</div>