 <script >
    $(function() {
        $('#datepickerDepartureDate').datepicker({
            changeMonth: true, //user can change month
            changeYear: true, //user can change year
            yearRange: '2013:2100', //range of valid years
            dateFormat: 'yy/mm/dd', //date format
            minDate: +0, //disable past days
        });
        $('#datepickerDestinationDate').datepicker({
            changeMonth: true, //user can change month
            changeYear: true, //user can change year
            yearRange: '2013:2100', //range of valid years
            dateFormat: 'yy/mm/dd', //date format
            minDate: +0, //disable past days
        });
    });

 function flightTypeChanged()
    {
        var selectedType = $('#flightType').val();

        if (selectedType == 'ONE_WAY')
        {
            $('#destinationDiv').hide();
        }
        else if (selectedType == 'TWO_WAYS')
        {
            $('#destinationDiv').show();
        }
        else
        {
            alert('Please select type of flight.');
            return false;
        }
        return true;
    }

    function sendAjaxRequestSearchFlight()
    {
        if (!flightTypeChanged())
        {
            return;
        }

        var depDate = $('#datepickerDepartureDate').val();
        var deskoutDate = $('#datepickerDestinationDate').val();

        if (depDate.length != 10)
        {
            alert('Bad departure Date.');
            Destination;
        }
        if (desDate.length != 10)
        {
            alert('Bad Destination Date.');
            Destination;
        }
        if (desDate < depDate)
        {
            alert('Checkout date should be greater than or equal to checkin date+');
            Destination;
        }

        var data = $('#SearchFlightTabForm').serialize();
        urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/searchFlight'); ?>'
        // alert(urlAjax);
        // change the caption of button
        $('#submit').val('Please wait...');

        $.ajax({
            type: 'POST',
            url: urlAjax,
            data: data,
            success: function(data) {
                // change the text on the screen with id = searchFlightResults
                $('#searchFlightResults').text('');  //clear div

                // write new data on it (results of actionSearchFlight() function on siteController)
                $('#searchFlightResults').append(showResults(data));

                // restore the caption of button
                $('#submit').val('Search Flight');
            },
            error: function(data) { // if error occured
                alert('Error occured. please try again.');

                // restore the caption of button
                $('#submit').val('Search Flight');
            },
            dataType: 'json', // this is the type of data we are receiving
            // from the controller not the data we
            // are sending to it
            timeout: 60000
        });
    }

</script>
