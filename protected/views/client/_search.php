<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'Id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Family',array('class'=>'span5','maxlength'=>70)); ?>

	<?php echo $form->textFieldRow($model,'Address',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'tell',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PassportNumber',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'RoomId',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CreditCardType',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'CreditCardExpiryDate',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'CreditCardHolderName',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'CreditCardSecurityNumber',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'CreditCardNumber',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
