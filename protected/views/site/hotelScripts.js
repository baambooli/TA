    $(function() {
        $('#datepickerCheckin').datepicker({
            changeMonth: true, //user can change month
            changeYear: true, //user can change year
            yearRange: '2013:2100', //range of valid years
            dateFormat: 'yy/mm/dd', //date format
            minDate: +0, //disable past days
        });
        $('#datepickerCheckout').datepicker({
            changeMonth: true, //user can change month
            changeYear: true, //user can change year
            yearRange: '2013:2100', //range of valid years
            dateFormat: 'yy/mm/dd', //date format
            minDate: +0, //disable past days
        });
    });

    function sendAjaxRequestSearchHotel()
    {
        var cityName = $('#SearchHotelForm_cityName').val();

        if (cityName.trim() == '')
        {
            alert('City name could not be empty.');
            return;
        }

        var checkinDate = $('#datepickerCheckin').val();
        var checkoutDate = $('#datepickerCheckout').val();

        if (checkinDate.length != 10)
        {
            alert('Bad checkin Date.');
            return;
        }
        if (checkoutDate.length != 10)
        {
            alert('Bad checkout Date.');
            return;
        }
        if (checkoutDate < checkinDate)
        {
            alert('Checkout date should be greater than or equal to checkin date+');
            return;
        }

        var data = $('#SearchHotelTabForm').serialize();
        urlAjax = "<?php echo Yii::app()->createAbsoluteUrl('site/searchHotel'); ?>";
        // alert(urlAjax);
        // change the caption of button
        $('#SearchHotelButton').val('Please wait...');

        $.ajax({
            type: 'POST',
            url: urlAjax,
            data: data,
            success: function(data) {
                // change the text on the screen with id = searchHotelResults
                $('#searchHotelResults').text('');  //clear div

                // write new data on it (results of actionSearchHotel() function on siteController)
                $('#searchHotelResults').append(showResults(data));

                // restore the caption of button
                $('#SearchHotelButton').val('Search Hotel');
            },
            error: function(data) { // if error occured
                alert('Error occured. please try again.');

                // restore the caption of button
                $('#submit').val('Search Hotel');
            },
            dataType: 'json', // this is the type of data we are receiving
            // from the controller not the data we
            // are sending to it
            timeout: 60000
        });
    }

    // creates an HTML table according to the json data
    // that is received from the controller
    function showResults(data)
    {
        if (data[0].RoomId == 'NOT FOUND')
        {
            return '<h3 style= "text-align: center"> Sorry, there is not any room available.</h3>';
        }
        // create output table
        var result = '<h1 style= "text-align: center"> Search Results</h1><br>';
        result += '<table class="Ktable"><tr><td style="padding: .3em; border: 1px #ccc solid;">';
        result += 'Room #</td><td style="padding: .3em; border: 1px #ccc solid;">City Name</td><td style="padding: .3em; border: 1px #ccc solid;">Hotel Name</td><td style="padding: .3em; border: 1px #ccc solid;">Category</td>';
        result += '<td style= "padding: .3em; border: 1px #ccc solid;">Room Type</td><td style="padding: .3em; border: 1px #ccc solid;">Price/day (CND)</td>';
        result += '<td style= "padding: .3em; border: 1px #ccc solid;">Reserve</td></tr>';

        for (var i = 0; i < data.length; i++)
        {
            result += '<tr><td style="padding: .3em; border: 1px #ccc solid;">'
                    + data[i].RoomNumber + '</td>';
            result += '<td style="padding: .3em; border: 1px #ccc solid;">'
                    + data[i].CityName + '</td><td style="padding: .3em; border: 1px #ccc solid;">';
            result += data[i].HotelName + '</td><td style="padding: .3em; border: 1px #ccc solid;">'
                    + data[i].HotelCategory + '</td>';
            result += '<td style="padding: .3em; border: 1px #ccc solid;">' + data[i].RoomType + '</td><td style="padding: .3em; border: 1px #ccc solid;">'
                    + data[i].PricePerDay + '</td>';
            result += '<td style="padding: .3em; border: 1px #ccc solid;">';
            result += '<input type="checkbox" name="reserveRoom" " value="' + data[i].RoomId + '"></td></tr>';
        }

        result += '</table><br><br>';

        if ('<?php echo Yii::app()->user->isGuest; ?>')
        {
            result += 'You are not loggen in. To reserve the hotel you should login to website.';
            result += ' Click <a href="<?php echo Yii::app()->createAbsoluteUrl(\'site/login\'); ?>" >here</a> to login.';
        }
        else
        {
            result += '<div class="KOuterDiv"> <div class="KCenter"> <input class="ui-button ui-widget ui-state-default ui-corner-all" id="reserveRoom" name="reserveRoom" type="button" value="Reserve selected room(s)" onclick="reserveRoomsUsingAjax();" /></div></div>';
        }

        return result;
    }

    function reserveRoomsUsingAjax()
    {
        // find all checkboxes
        var selectedRooms = '';

        $('input:checkbox[name=reserveRoom]:checked').each(function() {
            selectedRooms += $(this).val() + ',';
        });

        if (selectedRooms == '')
        {
            alert('you should select at least one room.');
            return;
        }

        // delete the last ','
        var strLen = selectedRooms.length;
        selectedRooms = selectedRooms.slice(0, strLen - 1);

        var checkinDate = $('#datepickerCheckin').val();
        var checkoutDate = $('#datepickerCheckout').val();

        if (checkinDate.length != 10)
        {
            alert('Bad checkin Date.');
            return;
        }
        if (checkoutDate.length != 10)
        {
            alert('Bad checkout Date.');
            return;
        }
        if (checkoutDate < checkinDate)
        {
            alert('Checkout date should be greater than or equal to checkin date+');
            return;
        }

        var getData = 'params=' + checkinDate + ';' + checkoutDate + ';' + selectedRooms;
        var urlAjax = '<?php echo Yii::app()->createAbsoluteUrl(\'site/reserveRooms\'); ?>';

        // change the button caption
        $('#reserveRoom').val('Sending, Please wait...');

        // send Ajax request
        $.ajax({
            type: 'GET',
            url: urlAjax,
            data: getData,
            success: function(data) {
                // change the text on the screen with id = searchHotelResults
                $('#searchHotelResults').text('');  //clear div

                //alert(data[0].result);
                $('#searchHotelResults').append(data[0].result);

                // hide the button
                $('#reserveRoom').hide();

            },
            error: function(data) { // if error occured
                alert('Error occured. please try again.');

                // show the button
                $('#reserveRoom').val('Reserve selected room(s)');
            },
            dataType: 'json', // this is the type of data we are receiving
            // from the controller not the data we
            // are sending to it
            timeout: 60000
        });
    }

