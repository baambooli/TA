
<!-- this does not work!! -->
<script type="text/javascript" src="FlightScripts.js"> </script>

<!-- so I should do like this -->
<?php require_once('FlightScripts.php');?>  

 <div class="KContainer">
    <div class="KLeft ">
      <div class="well ">
        <div >
            Departure city:<br>
            <input type="text"  id="datepickerDepartureCity" />
        </div>
        <div >
            Return city:<br>
            <input type="text" id="datepickerReturnCity" />
        </div>
           
        <!-- datepickers come here-->
        <div >
            Departure date:<br>
            <input type="text" name="datepickerDepartureDate" id="datepickerDepartureDate" />
        </div>
        <div >
            Return date:<br>
            <input type="text" name="datepickerReturnDate" id="datepickerReturnDate"  />
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
    </div>
</div>

