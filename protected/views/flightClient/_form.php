<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'flight-client-form',
	'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>                 

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model, 'ClientId', $model->getClientsFullName(), array('class' => 'span7')); ?>

	<?php echo $form->dropDownListRow($model, 'FlightId', $model->getFlightsFullInfo(), array('class' => 'span7')); ?>
    
    <br />
    <?php
        //this is one method for ajax call (using normal html button)
        echo CHtml::Button('Get Empty Seats', array('class' => ' ui-button ui-widget ui-state-default ui-corner-all',
        'id' => 'EmptySeats', 'onclick' => 'sendAjaxRequestGetEmptySeats();'));
    ?>
    <br />
    <br />

	   <?php echo $form->dropDownListRow($model, 'SeatId', array(), array('class' => 'span7')); ?>
    
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<script>
 function sendAjaxRequestGetEmptySeats()
    {
        // find flightId
        var flightId = $('#FlightClient_FlightId').val();
        
        var getData = 'params=' + flightId;
        var urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('flightClient/getFreeSeats'); ?>';
        
        // change the button caption
        $('#EmptySeats').val('Sending, Please wait...');

        // send Ajax request
        $.ajax({
            type: 'GET',
            url: urlAjax,
            data: getData,
            success: function(data) {
                alert('success.');
                
                // empty combobox
                $('#FlightClient_SeatId').empty();
                // change the text on the screen with id = FlightClient_SeatId
                $('#FlightClient_SeatId').append(data);

                // restore the button
                $('#EmptySeats').val('Get Empty Seats');

            },
            error: function(data) { // if error occured
                alert('Error occured. please try again.');

                // restore the button
                $('#EmptySeats').val('Get Empty Seats');
            },
            dataType: 'html', // this is the type of data we are receiving
            // from the controller not the data we
            // are sending to it
            timeout: 60000
        });
    }

</script>