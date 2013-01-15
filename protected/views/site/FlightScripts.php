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
</script>
<script> 
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
        result += 'Room #</td><td style="padding: .3em; border: 1px #ccc solid;">City Name</td><td style="padding: .3em; border: 1px #ccc solid;">Flight Name</td><td style="padding: .3em; border: 1px #ccc solid;">Category</td>';
        result += '<td style= "padding: .3em; border: 1px #ccc solid;">Room Type</td><td style="padding: .3em; border: 1px #ccc solid;">Price/day (CND)</td>';
        result += '<td style= "padding: .3em; border: 1px #ccc solid;">Reserve</td></tr>';

        for (var i = 0; i < data.length; i++)
        {
            result += '<tr><td style="padding: .3em; border: 1px #ccc solid;">'
                    + data[i].RoomNumber + '</td>';
            result += '<td style="padding: .3em; border: 1px #ccc solid;">'
                    + data[i].CityName + '</td><td style="padding: .3em; border: 1px #ccc solid;">';
            result += data[i].FlightName + '</td><td style="padding: .3em; border: 1px #ccc solid;">'
                    + data[i].FlightCategory + '</td>';
            result += '<td style="padding: .3em; border: 1px #ccc solid;">' + data[i].RoomType + '</td><td style="padding: .3em; border: 1px #ccc solid;">'
                    + data[i].PricePerDay + '</td>';
            result += '<td style="padding: .3em; border: 1px #ccc solid;">';
            result += '<input type="checkbox" name="reserveRoom" " value="' + data[i].RoomId + '"></td></tr>';
        }

        result += '</table><br><br>';

        if ('<?php echo Yii::app()->user->isGuest; ?>')
        {
            result += 'You are not loggen in. To reserve the Flight you should login to website.';
            result += ' Click <a href="<?php echo Yii::app()->createAbsoluteUrl('site/login'); ?>" ><span style="color:red"> here</span></a> to login.';
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
            Destination;
        }

        // delete the last ','
        var strLen = selectedRooms.length;
        selectedRooms = selectedRooms.slice(0, strLen - 1);

        var checkinDate = $('#datepickerDepartureDate').val();
        var checkoutDate = $('#datepickerDestinationDate').val();

        if (checkinDate.length != 10)
        {
            alert('Bad checkin Date.');
            Destination;
        }
        if (checkoutDate.length != 10)
        {
            alert('Bad checkout Date.');
            Destination;
        }
        if (checkoutDate < checkinDate)
        {
            alert('Checkout date should be greater than or equal to checkin date+');
            Destination;
        }

        var getData = 'params=' + checkinDate + ';' + checkoutDate + ';' + selectedRooms;
        var urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/reserveRooms'); ?>';

        // change the button caption
        $('#reserveRoom').val('Sending, Please wait...');

        // send Ajax request
        $.ajax({
            type: 'GET',
            url: urlAjax,
            data: getData,
            success: function(data) {
                // change the text on the screen with id = searchFlightResults
                $('#searchFlightResults').text('');  //clear div

                //alert(data[0].result);
                $('#searchFlightResults').append(data[0].result);

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

</script>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/scripts/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/globalization/jquery.global.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/scripts/gettheme.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/generatedata.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            var theme = getTheme();

            var data = generatedata(500);
            var source =
            {
                localdata: data,
                datafields:
                [
                    { name: 'name', type: 'string' },
                    { name: 'productname', type: 'string' },
                    { name: 'available', type: 'bool' },
                    { name: 'date', type: 'date'},
                    { name: 'quantity', type: 'number' }
                ],
                datatype: "array"
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            $("#jqxgrid").jqxGrid(
            {
                width: 800,
                source: dataAdapter,
                showfilterrow: true,
                filterable: true,
                theme: theme,
                selectionmode: 'multiplecellsextended',
                columns: [
                  { text: 'Name', columntype: 'textbox', filtertype: 'textbox', filtercondition: 'starts_with', datafield: 'name', width: 115 },
                  {
                      text: 'Product', filtertype: 'checkedlist', datafield: 'productname', width: 220
                  },
                  { text: 'Available', datafield: 'available', columntype: 'checkbox', filtertype: 'bool', width: 67 },
                  { text: 'Ship Date', datafield: 'date', filtertype: 'date', width: 210, cellsalign: 'right', cellsformat: 'd' },
                  { text: 'Qty.', datafield: 'quantity', filtertype: 'number',  cellsalign: 'right' }
                ]
            });
            $('#clearfilteringbutton').jqxButton({ height: 25, theme: theme });
            $('#clearfilteringbutton').click(function () {
                $("#jqxgrid").jqxGrid('clearfilters');
            });
        });
    </script>