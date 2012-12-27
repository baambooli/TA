<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FlagURL')); ?>:</b>
    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images_country/'.$data->FlagURL,'FlagURL',array('width'=>100)); ?>  
	<br />


</div>
