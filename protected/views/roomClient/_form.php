<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'room-client-form',
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        /* 'onsubmit'=>"return false;",  */ /* Disable normal form submit */
        'onkeypress' => " if(event.keyCode == 13){ sendAjaxRequest(); } " /* Do ajax call when user presses enter key */
    ),
        ));
?>

<?php echo $form->errorSummary($model); ?>
<div class="span5">

    <?php echo $form->dropDownListRow($model, 'ClientId', $model->getClientsFullName(), array('class' => 'span5')); ?>

    Country Name:<br>
    <?php
    echo CHtml::dropDownList('country_id', '', $model->getCountries(), array(
        'class' => 'span5',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('roomClient/dynamicCities'), //url to call.
            //Style: CController::createUrl('currentController/methodToCall')
            'update' => '#city_id', //selector to update
        //'data'=>'js:javascript statement'
        //leave out the data key to pass all form values through
            )));
    ?>
</div>
<div class="span5">
    City Name:<br>
    <?php
    //empty since it will be filled by the other dropdown
    echo CHtml::dropDownList('city_id', '', array(), array(
        'class' => 'span5',
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('roomClient/dynamicHotels'),
            'update' => "#hotel_id"
        //'data'=>'js:javascript statement'
        //leave out the data key to pass all form values through
            )));
    ?>
</div>
<div class="span5">
    Hotel Name:<br>
    <?php
//empty since it will be filled by the other dropdown
    echo CHtml::dropDownList('hotel_id', '', array(), array(
        'class' => 'span5',
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('roomClient/dynamicRooms'),
            'update' => "#room_id"
        //'data'=>'js:javascript statement'
        //leave out the data key to pass all form values through
            )));
    ?>
</div>
<div class="span5">
    Room Number:<br>
    <?php
    //empty since it will be filled by the other dropdown
    echo CHtml::dropDownList('room_id', '', array(), array('class' => 'span5'));
    ?>
</div>
<div class="span5">

    <?php echo $form->datepickerRow($model, 'StartDate', array('options' => array('format' => 'yyyy-mm-dd'), 'id' => 'start_date', 'prepend' => '<i class="icon-calendar"></i>')); ?>

    <?php echo $form->datepickerRow($model, 'EndDate', array('options' => array('format' => 'yyyy-mm-dd'), 'id' => 'end_date', 'prepend' => '<i class="icon-calendar"></i>')); ?>
    <br>

    <?php echo CHtml::Button('Check availability of room', array('onclick' => 'sendAjaxRequest();')); ?>

    <br><br>
    <div id="room_availability" style="color:green"></div>
    <br><br>

    <!-- a hidden field -->
    <?php echo CHtml::hiddenField('roomClientId', '', array()); ?>

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

</div>
<div class="span5">
    <?php
    foreach (Yii::app()->user->getFlashes() as $key => $message)
    {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
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
            alert('Check in date should be smaller than or equal to Check out date.');
            return;
        }
        //$('#save_update').html('Saving, Please wait....');
    });


    function sendAjaxRequest()
    {
        startDate = $('#start_date').val();
        endDate = $('#end_date').val();
        if (startDate > endDate)
        {
            alert('Check in date should be smaller than or equal to Check out date.');
            return;
        }
        
        $('#room_availability').text('Checking, Please wait ...');

        var updateMode = '<?php echo $updateMode ?>' ;
        // alert('updateMode is : '+ updateMode);

        var roomClientId = '<?php echo $model->Id ?>';
        //alert('roomClientId is : ' + roomClientId);

        $('#roomClientId').val(roomClientId);

        var data=$('#room-client-form').serialize();

        urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('roomClient/check'); ?>'

        //alert(urlAjax);

        $.ajax({
            type: 'POST',
            url: urlAjax,
            data: data,
            success: function(data) {
                //alert('success');
                //alert(data);
                // change the text on the screen with id = room_availability
                $('#room_availability').text(data);
            },
            error: function(data) { // if error occured
                alert('Error occured. please try again');
                //alert(data);
            },

            dataType:'html',
            timeout:60000
        });

    }
</script>