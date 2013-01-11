
<!-- this does not work!! -->
<script type="text/javascript" src="hotelScripts.js"> </script>

<!-- so I should do like this-->
<?php require_once('hotelScripts.php');?>  

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

