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
                'onkeypress' => " if(event.keyCode == 13){ sendAjaxRequestSearchHotel(); } " /* Do ajax call when user presses enter key */
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
                    'width' => '243px;',
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
                    'width' => '243px;',
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
                    'width' => '243px;',
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
                    'width' => '243px;',
                //'tokenSeparators' => array(',', ' ')
                )
            ));
            ?>
        </div>
        <div style='clear:both' >
            <?php echo $form->datepickerRow($modelHotel, 'checkinDate', array('options' => array('format' => 'yyyy-mm-dd'), 'id' => 'checkinDate1', 'prepend' => '<i class="icon-calendar"></i>')); ?>
            <?php echo $form->datepickerRow($modelHotel, 'checkoutDate', array('options' => array('format' => 'yyyy-mm-dd'), 'id' => 'checkoutDate1', 'prepend' => '<i class="icon-calendar"></i>')); ?>
        </div>
        <br>
        <?php CHtml::ajaxSubmitButton('search Hotel', $this->createUrl('site/searchHotel')); ?>
        <br>
        <?php echo CHtml::Button('search Hotel2', array('onclick' => 'sendAjaxRequestSearchHotel();')); ?>

        <?php $this->endWidget(); ?>
    </div>

    <div class="KContent well" id="searchHotelResults">
        right section................
    </div>

</div>
<script>
    // jQuery function to change the caption of key after click
    $('#searchBtn').click(function() {
        alert('hi1');
        startDate = $('#checkinDate1').val();
        endDate = $('#checkoutDate1').val();
        if (startDate > endDate)
        {
            alert('Check in date should be smaller than or equal to Check out date.');
            return;
        }
        //$('#save_update').html('Saving, Please wait....');
    });


    function sendAjaxRequestSearchHotel()
    {
        alert('hi2');

        var data = $('#SearcHotelTabForm').serialize();

        urlAjax = '<?php echo Yii::app()->createAbsoluteUrl('site/searchHotel'); ?>'

        alert(urlAjax);

        $.ajax({
            type: 'POST',
            url: urlAjax,
            data: data,
            success: function(data) {
                alert('success');
                alert(data);
                // change the text on the screen with id = room_availability
                //$('#room_availability').text('');  //clear div
                //$('#room_availability').append(data);
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
