<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'flight-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'FlightNumber',array('class'=>'span5','maxlength'=>50)); ?>

    <?php echo $form->dropDownListRow($model, 'AirlineId', $model->getAirlines(), array('class' => 'span5', 'onchange' => 'ajaxGetAirplane();')); ?>

    <?php echo $form->dropDownListRow($model, 'AirplaneId', array(), array('class' => 'span5')); ?>

    <?php echo $form->datepickerRow($model, 'TakeoffDate', array('options'=>array('format' => 'yyyy-mm-dd'), 'hint'=>'Click inside to select a date! ', 'prepend'=>'<i class="icon-calendar"></i>')); ?>
    
    <?php echo $form->timepickerRow($model, 'TakeoffTime', array('hint'=>'Select Takeoff time', 'append'=>'<i class="icon-time" style="cursor:pointer"></i>'));?>
    
    <?php echo $form->datepickerRow($model, 'LandingDate', array('options'=>array('format' => 'yyyy-mm-dd'), 'hint'=>'Click inside to select a date! ', 'prepend'=>'<i class="icon-calendar"></i>')); ?>
    
    <?php echo $form->timepickerRow($model, 'LandingTime', array('hint'=>'Select Landing time', 'append'=>'<i class="icon-time" style="cursor:pointer"></i>'));?>
      
	<?php echo $form->dropDownListRow($model, 'DepartureAirportId', $model->getAirports(), array('class' => 'span5')); ?>

    <?php echo $form->dropDownListRow($model, 'DestinationAirportId', $model->getAirports(), array('class' => 'span5')); ?>

	<?php echo $form->textFieldRow($model,'PriceOfFirstClassSeats',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PriceOfBusinessClassSeats',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PriceOfEconomyClassSeats',array('class'=>'span5')); ?>

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
    //$('#save_update').html('Saving, Please wait ....');
    
    var airlineId= $('#Flight_AirlineId').val();
    if (airlineId ==0 || airlineId.trim() == '' )
    {
        alert('Please select an airline.');
        return;   
    }
    
    var airplaneId= $('#Flight_AirplaneId').val();
    if (airplaneId ==0 || airplaneId.trim() == '' )
    {
        alert('Please select an airplane.');
        return;   
    }
    
    var startDate = $('#Flight_TakeoffDate').val();
    var endDate = $('#Flight_LandingDate').val();
    if (startDate > endDate)
    {
        alert('Take off date should be smaller than or equal to Landing date.');
        return;
    }
    
    var takeoffTime = $('#Flight_TakeoffTime').val();
    var landingTime = $('#Flight_LandingTime').val();
    if ((startDate == endDate) && (takeoffTime >= landingTime))
    {
        alert('Take off time should be smaller than to Landing time.');
        return;
    }

    var depCity = $('#Flight_DepartureAirportId').val();
    var desCity = $('#Flight_DestinationAirportId').val();
    if (depCity == desCity)
    {
        alert('departure and destination cities cannot be the same.');
        return;
    }
});
</script>

<script >
    function ajaxGetAirplane()
    {
        var airlineId= $('#Flight_AirlineId').val();
        //alert(airlineId);
        $('#Flight_AirplaneId').empty().append('please wait...');
        
        var getData = 'airlineId=' + airlineId;
        var urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('flight/dynamicAirplane'); ?>';
        
        // send Ajax request
        $.ajax({
            type: 'GET',
            url: urlAjax,
            data: getData,
            success: function(data) {
                //alert('success');
                //alert(data);
                // empty combobox
                $('#Flight_AirplaneId').empty();
                // change the text on the screen with id = Flight_AirplaneId
                $('#Flight_AirplaneId').append(data);  
            },
            error: function(data) { // if error occured
                alert('Error occured. please try again.');

            },
            dataType:'html', // this is the type of data we are receiving
                              // from the controller not the data we
                              // are sending to it
            timeout: 60000
        });
    }
</script>
