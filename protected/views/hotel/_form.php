<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'hotel-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    // for image upload , we need these lines
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'Category',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'CityId',$model->getCities(), array('class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model,'Tel',array('class'=>'span5','maxlength'=>255)); ?>

    <?php echo $form->textFieldRow($model,'Fax',array('class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model,'Address',array('class'=>'span5','maxlength'=>255)); ?>

    <?php echo $form->textFieldRow($model,'URL',array('class'=>'span5')); ?>
    
    <?php echo $form->textFieldRow($model,'Email',array('class'=>'span5','maxlength'=>255)); ?>

    <div >
        <?php echo $form->fileFieldRow($model, 'Image'); ?>
    </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
            'id'=>'save_update',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<script>

// jQuery function to change the caption of key after click
$('#save_update').click(function() {
    $('#save_update').html('Saving, Please wait ....');
});
</script>