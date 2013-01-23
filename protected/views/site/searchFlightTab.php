
<!-- this does not work!! -->
<script type="text/javascript" src="FlightScripts.js"></script>

<!-- so I should do like this -->
<?php require_once('flightScripts.php'); ?>

<div class="KContainer">
    <div class="KLeft2">
        <div class="well">
            <form id="SearchFlightTabForm" name="SearchFlightTabForm">
                <div >
                    Select type of flight:<br>
                    <select id="flightType" name="flightType" onchange="flightTypeChanged();"/>
                    <option value="0">Please select...</option>
                    <option value="ONE_WAY">One way</option>
                    <option value="TWO_WAYS">Round Trip</option>
                    </select>
                </div>

                <div >
                    Departure city and airport:<br>
                    <select id="departureAirportName" name="departureAirportName"/>
                    <option value="0">Please select...</option>
                    <?php
                    foreach ($airportsName as $key => $value)
                    {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                    ?>
                    </select>
                </div>
                <div >
                    Destination city and airport:<br>
                    <select id="destinationAirportName" name="destinationAirportName"/>
                    <option value="0">Please select...</option>
                    <?php
                    foreach ($airportsName as $key => $value)
                    {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                    ?>
                    </select>
                </div>

                <!-- datepickers come here-->
                <div >
                    Departure date:<br>
                    <input type="text" name="datepickerDepartureDate" id="datepickerDepartureDate" />
                </div>
                <div id="destinationDiv">
                    Destination date:<br>
                    <input type="text" name="datepickerDestinationDate" id="datepickerDestinationDate"  />
                </div>
                <!-- end of datepickers -->
                <br>
                <div class="KOuterDiv">
                    <div class="KCenter">
                        <?php
                        //this is one method of ajax call (using normal html button)
                        echo CHtml::Button('Search Flight', array('class' => ' ui-button ui-widget ui-state-default ui-corner-all',
                            'id' => 'searchFlightButton', 'onclick' => 'sendAjaxRequestSearchFlight();'));
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="well KContent" id="searchFlightResults">
        <div id="flightGridHeader">
        </div>
        <div id="jqxgrid">
        </div>
        <div id="flightGridFooter">
        </div>
    </div>
</div>

