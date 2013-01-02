<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'room-client-form',
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
echo CHtml::dropDownList('country_id', '', $model->getCountries(), array(
    'ajax' => array(
        'type' => 'POST', //request type
        'url' => CController::createUrl('roomClient/dynamicCities'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
        'update' => '#city_id', //selector to update
//'data'=>'js:javascript statement'
//leave out the data key to pass all form values through
        )));

//empty since it will be filled by the other dropdown
echo CHtml::dropDownList('city_id','', array(), array(
                        'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('roomClient/dynamicHotels'),
                        'update' => "#hotel_id"
                    )));
echo CHtml::dropDownList('hotel_id','', array()); 
?>
<?php echo $form->textFieldRow($model, 'RoomId', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'ClientId', array('class' => 'span5')); ?>

<?php echo $form->datepickerRow($model, 'StartDate', array('options' => array('format' => 'yyyy-mm-dd'), 'id' => 'start_date', 'prepend' => '<i class="icon-calendar"></i>')); ?>

<?php echo $form->datepickerRow($model, 'EndDate', array('options' => array('format' => 'yyyy-mm-dd'), 'id' => 'end_date', 'prepend' => '<i class="icon-calendar"></i>')); ?>

<?php echo $form->dropDownListRow($model, 'Status', $model->getStatus(), array('class' => 'span5')); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'id' => 'save_update',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>
<?php $this->endWidget(); ?>
<script>
    // jQuery function to change the caption of key after click
    $('#save_update').click(function() {
        startDate = $('#start_date').val();
        endDate = $('#end_date').val();
        if (startDate > endDate)
        {
            alert('start date should be smaller or equal to end date.');
            return;
        }
        $('#save_update').html('Saving, Please wait ....');
    });
</script>