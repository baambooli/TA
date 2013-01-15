 <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/styles/jqx.base.css" type="text/css" />
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

<?php /*
  in this page we should delete this line
  
  <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/scripts/jquery-1.8.2.min.js"></script>
  
  to avoid with the scripts in index.php. but normally we need that
  
  kamran
*/ ?>

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
        if (!checkValidation())
        {
            return false;
        }

        var data = $('#SearchFlightTabForm').serialize();
        urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/searchFlight'); ?>'
        //alert(urlAjax);

        // change the caption of button
        $('#searchFlightButton').val('Please wait...');

        $.ajax({
            type: 'POST',
            url: urlAjax,
            data: data,
            success: function(data) {
                alert('Success.');
                // change the text on the screen with id = searchFlightResults
                $('#searchFlightResults').text('success2');  //clear div

                // write new data on it (results of actionSearchFlight() function on siteController)
                $('#searchFlightResults').append(showResults(data));

                // restore the caption of button
                $('#searchFlightButton').val('Search Flight');
            },
            error: function(data) { // if error occured
                alert('Error occured. please try again.');

                // restore the caption of button
                $('#searchFlightButton').val('Search Flight');
            },
            dataType: 'json', // this is the type of data we are receiving
            // from the controller not the data we
            // are sending to it
            timeout: 60000
        });
    }

    function checkValidation()
    {
        if (!flightTypeChanged())
        {
            return false;
        }

        var departureAirport = $('#DepartureAirportName').val();
        if (departureAirport == 0)
        {
            alert('You should select a departure Airport.');
            return false;
        }

        var destinationAirport = $('#DestinationAirportName').val();
        if (destinationAirport == 0)
        {
            alert('You should select a destination Airport.');
            return false;
        }

        if (destinationAirport == departureAirport)
        {
            alert('Departure airport and destination airport should be different.');
            return false;
        }

        var depDate = $('#datepickerDepartureDate').val();
        var deskoutDate = $('#datepickerDestinationDate').val();

        if (depDate.length != 10)
        {
            alert('Bad departure Date.');
            return false;
        }

        if ($('#flightType').val() == 'TWO_WAYS')
        {
            if (desDate.length != 10)
            {
                alert('Bad Destination Date.');
                return false;
            }
            if (desDate < depDate)
            {
                alert('return date should be greater than or equal to departure date.');
                return false;
            }
        }
        return true;
    }

    function reserveFlightsUsingAjax()
    {
        // find all checkboxes
        var selectedFlights = '';

        $('input:checkbox[name=reserveFlight]:checked').each(function() {
            selectedFlights += $(this).val() + ',';
        });

        if (selectedFlights == '')
        {
            alert('you should select at least one Flight.');
            Destination;
        }

        // delete the last ','
        var strLen = selectedFlights.length;
        selectedFlights = selectedFlights.slice(0, strLen - 1);

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

        var getData = 'params=' + checkinDate + ';' + checkoutDate + ';' + selectedFlights;
        var urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/reserveFlights'); ?>';

        // change the button caption
        $('#reserveFlight').val('Sending, Please wait...');

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
                $('#reserveFlight').hide();

            },
            error: function(data) { // if error occured
                alert('Error occured. please try again.');

                // show the button
                $('#reserveFlight').val('Reserve selected Flight(s)');
            },
            dataType: 'json', // this is the type of data we are receiving
            // from the controller not the data we
            // are sending to it
            timeout: 60000
        });
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
    //function showResults(data1) {
        alert('hi 3');
        var theme = getTheme();
        alert('hi 4');
        var data = generatedata(500);
        alert('hi 5');
        alert('data length is '+ data.length);

        var source =
                {
                    localdata: data,
                    datafields:
                            [
                                {name: 'name', type: 'string'},
                                {name: 'productname', type: 'string'},
                                {name: 'available', type: 'bool'},
                                {name: 'date', type: 'date'},
                                {name: 'quantity', type: 'number'}
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
                        {text: 'Name', columntype: 'textbox', filtertype: 'textbox', filtercondition: 'starts_with', datafield: 'name', width: 115},
                        {
                            text: 'Product', filtertype: 'checkedlist', datafield: 'productname', width: 220
                        },
                        {text: 'Available', datafield: 'available', columntype: 'checkbox', filtertype: 'bool', width: 67},
                        {text: 'Ship Date', datafield: 'date', filtertype: 'date', width: 210, cellsalign: 'right', cellsformat: 'd'},
                        {text: 'Qty.', datafield: 'quantity', filtertype: 'number', cellsalign: 'right'}
                    ]
                });
        $('#clearfilteringbutton').jqxButton({height: 25, theme: theme});
        $('#clearfilteringbutton').click(function() {
            $("#jqxgrid").jqxGrid('clearfilters');
        });
    //}
    });
</script>
