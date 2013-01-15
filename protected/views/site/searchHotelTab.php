
<!-- this does not work!! -->
<script type="text/javascript" src="hotelScripts.js"></script>

<!-- so I should do like this-->
<?php require_once('hotelScripts.php'); ?>

<div class="KContainer">
    <div class="KLeft well">
        <form name="SearchHotelTabForm" id="SearchHotelTabForm">
            <div>
                City Name:<br>
                <select id="CityName" name="CityName"/>
                <?php
                foreach ($citiesName as $key => $value)
                {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                }
                ?>
                </select>
            </div>
            <div>
                Hotel Category (Stars):<br>
                <select id="HotelCategory" name="HotelCategory"/>
                <option value="ALL">ALL</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>
            </div>
            <div>
                Room Type:<br>
                <select id="RoomType" name="RoomType"/>
                <option value="ALL">ALL</option>
                <?php
                foreach ($roomsType as $key => $value)
                {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                }
                ?>
                </select>
            </div>
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

            <div class="KOuterDiv">
                <div class="KCenter">
                    <?php
                    //this is one method for ajax call (using normal html button)
                    echo CHtml::Button('Search Hotel', array('class' => ' ui-button ui-widget ui-state-default ui-corner-all',
                        'id' => 'SearchHotelButton', 'onclick' => 'sendAjaxRequestSearchHotel();'));
                    ?>
                </div>
            </div>
        </form>
    </div>
    <div class="well KContent" id="searchHotelResults">
    </div>
</div>


