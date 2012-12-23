<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'city-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
     <?php echo "kamran"; ?>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>50)); ?>

    <?php echo $form->dropDownListRow($model,'countryId',$model->getCountries(), array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
