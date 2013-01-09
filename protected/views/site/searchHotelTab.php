<!-- datepicker function call-->
<script>
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
</script>
<!-- end of datepicker function call-->
<div class="KContainer">
    <div class="KLeft">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'SearchHotelTabForm',
            'enableClientValidation' => true,
            'enableAjaxValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array(
                'class' => 'well',
                /* Disable normal form submit */
                'onsubmit' => 'return false;',
                /* Do ajax call when user presses enter key */
                'onkeypress' => ' if(event.keyCode == 13){ sendAjaxRequestSearchHotel(); } '
            ),
                ));
        ?>
        <?php echo $form->errorSummary($modelHotel); ?>
        <div>
            City:<br>
            <?php
            $this->widget('bootstrap.widgets.TbSelect2', array(
                'asDropDownList' => false,
                'model' => $modelHotel,
                'attribute' => 'cityName',
                'options' => array(
                    'tags' => $citiesName,
                    'placeholder' => 'City Name',
                    'maximumSelectionSize' => '1', // just select one item
                    'width' => '217px;',
                //'tokenSeparators' => array(',', ' ')
                ),
            ));
            ?>
        </div>
        <div>
            Category (Stars):<br>
            <?php
            $this->widget('bootstrap.widgets.TbSelect2', array(
                'asDropDownList' => false,
                'model' => $modelHotel,
                'attribute' => 'category',
                'options' => array(
                    'tags' => array('2', '3', '4', '5'), //array('Two stars', 'Three stars', 'Four stars', 'Five stars'),
                    'placeholder' => 'Category of Hotel',
                    'maximumSelectionSize' => '1', // just select one item
                    'width' => '217px;',
                //'tokenSeparators' => array(',', ' ')
                )
            ));
            ?>
        </div>
        <div>
            Room Type:<br>
            <?php
            $this->widget('bootstrap.widgets.TbSelect2', array(
                'asDropDownList' => false,
                'model' => $modelHotel,
                'attribute' => 'roomType',
                'options' => array(
                    'tags' => $roomTypes,
                    'placeholder' => 'Room type',
                    'maximumSelectionSize' => '1', // just select one item
                    'width' => '217px;',
                //'tokenSeparators' => array(',', ' ')
                )
            ));
            ?>
        </div>
        <?php /*
          <div>
          Number of room(s):<br>
          <?php
          $this->widget('bootstrap.widgets.TbSelect2', array(
          'asDropDownList' => false,
          'model' => $modelHotel,
          'attribute' => 'noOfRooms',
          'options' => array(
          'tags' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
          'placeholder' => 'Number of rooms',
          'maximumSelectionSize' => '1', // just select one item
          'width' => '217px;',
          //'tokenSeparators' => array(',', ' ')
          )
          ));
          ?>
          </div>
         */ ?>
        <!-- datepickers come here-->
        <div >
            Checkin date:<br>
            <input type="text" name="datepickerCheckin" id="datepickerCheckin" />
        </div>
        <div >
            Checkout date:<br>
            <input type="text" name="datepickerCheckout" id="datepickerCheckout"  />
        </div>
        <!-- end of datepickers -->
        <br>
        <?php
        //this is one method to ajax call by normal html button
        // echo CHtml::Button('search Hotel2', array('onclick' => 'sendAjaxRequestSearchHotel();'));
        ?>
        <div class="KOuterDiv">
            <div class="KCenter">
                <?php
                $this->widget('zii.widgets.jui.CJuiButton', array(
                    'name' => 'submit',
                    'caption' => 'Search Hotel',
                    // you can easily change the look of the button by providing the correct class
                    // ui-button-error, ui-button-primary, ui-button-success
                    'htmlOptions' => array('class' => 'ui-button-success'),
                    // this is a sample of calling inline jQuery function
                    //'onclick' => new CJavaScriptExpression('function(){alert("Yes kamran");}'),
                    // this is a sample of calling a function that uses ajax method to send request to controller
                    'onclick' => new CJavaScriptExpression('function(){sendAjaxRequestSearchHotel();}'),
                ));
                ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="well KContent" id="searchHotelResults">

    </div>
</div>
<script>
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
        urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/searchHotel'); ?>'
        // alert(urlAjax);
        // change the caption of button
        $('#submit').val('Please wait...');
        
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
                $('#submit').val('Search Hotel');
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
            return '<h1 style= "text-align: center"> Sorry, there is not any result.</h1>';
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
        
        if ('<?php echo Yii::app()->user->isGuest;?>')
        {
            result += 'You are not loggen in. To reserve the hotel you should login to website.';
            result += ' Click <a href="<?php echo Yii::app()->createAbsoluteUrl('site/login');?>" >here</a> to login.';
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

        $('input:checkbox[name=reserveRoom]:checked').each(function () {
             selectedRooms +=  $(this).val() + ',';
        });
        
        if (selectedRooms == '')
        {
            alert('you should select at least one room.');
            return;
        }
        
        // delete the last ','
        var strLen = selectedRooms.length;
        selectedRooms = selectedRooms.slice(0, strLen-1);
        
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
        
        var getData = 'params=' + checkinDate + ';'+ checkoutDate + ';'+ selectedRooms;
        var urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/reserveRooms'); ?>';
        
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
    
</script>
