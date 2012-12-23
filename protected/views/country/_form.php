<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'country-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
     // for image upload
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>50)); ?>

    <!-- <?php echo $form->textFieldRow($model,'FlagURL',array('class'=>'span5','maxlength'=>255)); ?> -->
    
    <div >
        <?php echo $form->labelEx($model,'FlagURL'); ?>
        <?php echo CHtml::activeFileField($model, 'FlagURL'); // by this we can upload image ?>  
    </div>
    
    <?php if(!$model->isNewRecord) {
             // Image shown here if page is update page  
             echo '<div >';
             echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$model->FlagURL,"FlagURL",array("width"=>200));   
             echo '</div>';
          }
    ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
