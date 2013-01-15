
<!-- this does not work!! -->
<script type="text/javascript" src="FlightScripts.js"> </script>

<!-- so I should do like this -->
<?php require_once('FlightScripts.php');?>  

 <div class="KContainer">
    <div class="KLeft">
      <div class="well">
        <div >
            Select type of flight:<br>
            <select id="flightType" onchange="flightTypeChanged();"/>
              <option value="0">Please select</option>
              <option value="ONE_WAY">One way</option>
              <option value="TWO_WAYS">Two ways</option>
            </select>
        </div>
        
        <div >
            Departure city:<br>
            <input type="text"  id="datepickerDepartureCity" />
        </div>
        <div >
            Destination city:<br>
            <input type="text" id="datepickerDestinationCity" />
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
                 //this is one method to ajax call by normal html button
                 echo CHtml::Button('Search Flight', array('class' => ' ui-button ui-widget ui-state-default ui-corner-all', 'onclick' => 'sendAjaxRequestSearchFlight();'));
                ?>
             </div>
        </div>
        </div>
    </div>
    <div class="well KContent" id="searchFlightResults">
        right panel
        <div id="jqxgrid">
        </div>
    </div>
</div>

