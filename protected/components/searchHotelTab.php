<!-- datepicker function call-->
<script>
    $(function() {
        $("#datepickerCheckin").datepicker({
            changeMonth: true, //user can change month
            changeYear: true, //user can change year
            yearRange: '2013:2100', //range of valid years
            dateFormat: 'yy/mm/dd', //date format
        });
        $("#datepickerCheckout").datepicker({
            changeMonth: true, //user can change month
            changeYear: true, //user can change year
            yearRange: '2013:2100', //range of valid years
            dateFormat: 'yy/mm/dd', //date format
        });
    });
</script>
<!-- end of datepicker function call-->
<div class="KContainer">
    <div class="KLeft">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'SearcHotelTabForm',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array(
                'class' => 'well',
                /* Disable normal form submit */
                'onsubmit' => "return false;",
                /* Do ajax call when user presses enter key */
                'onkeypress' => " if(event.keyCode == 13){ sendAjaxRequestSearchHotel(); } "
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
                    'id' =>'citynameId',
                //'tokenSeparators' => array(',', ' ')
                )
            ));
            ?>
        </div>
        <div>
            Category:<br>
            <?php
            $this->widget('bootstrap.widgets.TbSelect2', array(
                'asDropDownList' => false,
                'model' => $modelHotel,
                'attribute' => 'category',
                'options' => array(
                    'tags' => array('Two starts', 'Three starts', 'Four starts', 'Five starts'),
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
        <!-- datepickers come here-->
        <div >
            Check in date:<br>
            <input type="text" name="datepickerCheckin" id="datepickerCheckin" />
        </div>
        <div >
            Check out date:<br>
            <input type="text" name="datepickerCheckout" id="datepickerCheckout" />
        </div>
        <!-- end of datepickers -->
        <br>
        <?php
        // this is one method to ajax call by normal html button
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
        right section................
    </div>
</div>
<script>
    function sendAjaxRequestSearchHotel()
    {

        var cityName = $('#citynameId').val();

        if ($.trim(cityName) == '')
        {
            alert('City name could not be empty.');
            return false;
        }
        var checkinDate = $('#datepickerCheckin').val();
        var checkoutDate = $('#datepickerCheckout').val();
        if ($.trim(checkinDate) == '' || $.trim(checkoutDate) == '')
        {
            alert('dates could not be empty.');
            return false;
        }
        if (checkoutDate < checkinDate)
        {
            alert('Checkout date should be greater than or equal to checkin date.');
            return false;
        }
        var data = $('#SearcHotelTabForm').serialize();
        urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/searchHotel'); ?>'
        // alert(urlAjax);
        $.ajax({
            type: 'POST',
            url: urlAjax,
            data: data,
            success: function(data) {
                //alert('success');
                //alert(data);
                // change the text on the screen with id = searchHotelResults
                $('#searchHotelResults').text('');  //clear div
                // write new data on it (results of actionSearchHotel() function on siteController)
                $('#searchHotelResults').append(data);
            },
            error: function(data) { // if error occured
                alert('Error occured. please try again');
                //alert(data);
            },
            dataType: 'html',
            timeout: 60000
        });
    }
</script>
