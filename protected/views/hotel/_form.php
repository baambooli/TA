<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'hotel-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'Category',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'CityId',$model->getCities(), array('class'=>'span5')); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
