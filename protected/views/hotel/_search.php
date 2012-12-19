<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'Category',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PricePerDay',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'CityId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RoomId',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
