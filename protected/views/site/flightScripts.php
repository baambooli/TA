<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/styles/jqx.base.css" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.pager.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/jqwidgets-ver2.6.0/jqwidgets/jqxgrid.columnsresize.js"></script>
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

                $('#jqxgrid').show();
                showFlightResults(data);

                // restore the caption of button
                $('#searchFlightButton').val('Search Flight');
            },
            error: function(data) { // if error occured
                alert('Error occured. please try again.');

                $('#flightGridHeader').text('');  //clear div
                $('#flightGridfooter').text('');  //clear div
                $('#jqxgrid').hide();

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

        var departureAirport = $('#departureAirportName').val();
        if (departureAirport == 0)
        {
            alert('You should select a departure Airport.');
            return false;
        }

        var destinationAirport = $('#destinationAirportName').val();
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
        var desDate = $('#datepickerDestinationDate').val();

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

    function reserveFlightSeatsUsingAjax()
    {
        var type = $('#flightType').val();

        // find all checkboxes
        var selectedFlights = '';

        $('input:checkbox[name=reserveFlight]:checked').each(function() {
            selectedFlights += $(this).val() + ',';
        });

        if (selectedFlights == '')
        {
            alert('you should select at least one Flight.');
            return;
        }

        // delete the last ','
        var strLen = selectedFlights.length;
        selectedFlights = selectedFlights.slice(0, strLen - 1);

        var departureDate = $('#datepickerDepartureDate').val();
        var destinationDate = $('#datepickerDestinationDate').val();

        if (departureDate.length != 10)
        {
            alert('Bad departure Date.');
            return;
        }
        if (destinationDate.length != 10 && type == 'TWO_WAYS')
        {
            alert('Bad destination Date.');
            return;
        }
        if (destinationDate < departureDate && type == 'TWO_WAYS')
        {
            alert('destination date should be greater than or equal to departure date.');
            return;
        }

        var data1 = 'params=' + type + ';' + departureDate + ';' + destinationDate + ';' + selectedFlights;
        var urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/reserveFlights'); ?>';

        // change the button caption
        $('#reserveFlight').val('Sending, Please wait...');

        // send Ajax request
        $.ajax({
            type: 'GET',
            url: urlAjax,
            data: data1,
            success: function(data) {
                //alert('success');
                // change the text on the screen with id = flightGridHeader
                $('#flightGridHeader').text('');  //clear div
                $('#flightGridfooter').text('');  //clear div
                $('#jqxgrid').hide();  //hide grid

                // show results
                $('#flightGridHeader').append(data[0].result);

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

    function showFlightResults(data)
    {
        $('#flightGridHeader').html('<h3 style= "text-align: center"> Search Results</h3><br/>');

        var theme = getTheme();

        //alert('data length is '+ data.length);

        var source =
                {
                    localdata: data,
                    datatype: "json",
                    datafields:
                            [
                                {name: 'FlightNumber', type: 'string'},
                                {name: 'SeatNumber', type: 'string'},
                                {name: 'SeatType', type: 'string'},
                                {name: 'TakeoffDate', type: 'string'},
                                {name: 'LandingDate', type: 'string'},
                                {name: 'Price', type: 'Number'},
                                {name: 'Reserve', type: 'string'}
                            ],
                    pager: function(pagenum, pagesize, oldpagenum) {
                        // callback called when a page or page size is changed.
                    }
                };

        var dataAdapter = new $.jqx.dataAdapter(source);

        $("#jqxgrid").jqxGrid(
                {
                    width: 783,
                    height: 355,
                    pageable: true,
                    source: dataAdapter,
                    showfilterrow: true,
                    filterable: true,
                    theme: theme,
                    selectionmode: 'multiplecellsextended',
                    columns: [
                        {text: 'Flight Number', columntype: 'textbox', filtertype: 'checkedlist', filtercondition: 'starts_with', datafield: 'FlightNumber', width: 115},
                        {text: 'Seat Number', columntype: 'textbox', filtertype: 'textbox', filtercondition: 'starts_with', datafield: 'SeatNumber', width: 105},
                        {text: 'Seat Type', columntype: 'textbox', filtertype: 'checkedlist', filtercondition: 'starts_with', datafield: 'SeatType', width: 115},
                        {text: 'Takeoff Date', columntype: 'textbox', filtertype: 'checkedlist', filtercondition: 'starts_with', datafield: 'TakeoffDate', width: 160},
                        {text: 'Landing Date', columntype: 'textbox', filtertype: 'checkedlist', filtercondition: 'starts_with', datafield: 'LandingDate', width: 160},
                        {text: 'Price($)', columntype: 'textbox', filtertype: 'textbox', filtercondition: 'starts_with', datafield: 'Price', width: 65},
                        {text: 'Reserve', columntype: 'textbox', filtertype: 'textbox', filtercondition: 'starts_with', datafield: 'Reserve', width: 65},
                    ]
                }
        );
        
        // add functionality to page navigation and other grid options
        $("#jqxgrid").bind("pagechanged", function (event) {
            $("#eventslog").css('display', 'block');
            if ($("#events").find('.logged').length >= 5) {
                $("#events").jqxPanel('clearcontent');
            }
            var args = event.args;
            var eventData = "pagechanged <div>Page:" + args.pagenum + ", Page Size: " + args.pagesize + "</div>";
            $('#events').jqxPanel('prepend', '<div class="logged" style="margin-top: 5px;">' + eventData + '</div>');
            // get page information.
            var paginginformation = $("#jqxgrid").jqxGrid('getpaginginformation');
            $('#paginginfo').html("<div style='margin-top: 5px;'>Page:" + paginginformation.pagenum + ", Page Size: " + paginginformation.pagesize + ", Pages Count: " + paginginformation.pagescount);
        });
        $("#jqxgrid").bind("pagesizechanged", function (event) {
            $("#eventslog").css('display', 'block');
            $("#events").jqxPanel('clearcontent');
            var args = event.args;
            var eventData = "pagesizechanged <div>Page:" + args.pagenum + ", Page Size: " + args.pagesize + ", Old Page Size: " + args.oldpagesize + "</div>";
            $('#events').jqxPanel('prepend', '<div style="margin-top: 5px;">' + eventData + '</div>');
            // get page information.          
            var paginginformation = $("#jqxgrid").jqxGrid('getpaginginformation');
            $('#paginginfo').html("<div style='margin-top: 5px;'>Page:" + paginginformation.pagenum + ", Page Size: " + paginginformation.pagesize + ", Pages Count: " + paginginformation.pagescount);
        });

        showGridFooter();
    }

    function showGridFooter()
    {
        var footer = '<br/>';

        if ('<?php echo Yii::app()->user->isGuest; ?>')
        {
            footer += 'You are not logged in. To reserve a flight you should login to website.';
            footer += ' Click <a href="<?php echo Yii::app()->createAbsoluteUrl('site/login'); ?>" ><span style="color:red"> here</span></a> to login.';
        }
        else
        {
            footer += '<div class="KOuterDiv"> <div class="KCenter"> <input class="ui-button ui-widget ui-state-default ui-corner-all" id="reserveFlight" name="reserveFlight" type="button" value="Reserve selected Flight Seat(s)" onclick="reserveFlightSeatsUsingAjax();" /></div></div>';
        }
        $('#flightGridFooter').html(footer);
    }
</script>
