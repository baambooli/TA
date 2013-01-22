
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
                    <option value="0">Please select</option>
                    <option value="ONE_WAY">One way</option>
                    <option value="TWO_WAYS">Two ways</option>
                    </select>
                </div>

                <div >
                    Departure city and airport:<br>
                    <select id="departureAirportName" name="departureAirportName"/>
                    <option value="0">Please select</option>
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
                    <option value="0">Please select</option>
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
        <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
            <div id="jqxgrid">
            </div>
            <div id="eventslog" style="display: none; margin-top: 30px;">
                <div style="float: left;">
                    Event Log:
                    <div style="border: none;" id="events">
                    </div>
                </div>
                <div style="float: left;">
                    Paging Details:
                    <div id="paginginfo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

