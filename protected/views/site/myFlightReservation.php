

<h1>My Flight(s) reservation</h1>


<?php
//very important line
// if we use $modelSearchFlightView in CLinkColumn, it does nor work
// so we should define this line
$data = $modelSearchFlightView;

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'room-client-grid',
    'dataProvider' => $modelSearchFlightView->searchMyFlightReservations($clientId),
    'filter' => $modelSearchFlightView,
    'columns' => array(
        'FlightNumber',
        'SeatNumber',
        'SeatType',
        'ClientFullName',
        'DepartureAirportName',
        'DestinationAirportName',
        'TakeoffDate',
        'Status',
        //////////////////////////////////////////////////////////////////////////////////////
        // make it a linkable column
        array(
            'class' => 'CLinkColumn',
            // create a sortable header for column
            'header' => 'Cancel/Reserve',
            // label that user will see
            'labelExpression' => '$data->FlightClientId',
            // url of the link
            'urlExpression' => 'Yii::app()->createUrl("/site/cancelMyFlightReservation/id/".$data->FlightClientId)',
            // tool tip
            'linkHtmlOptions' => array('title' => 'Cancel this reservation')
        ),
    ///////////////////////////////////////////////////////////////////////////////////////
    /* array(
      'class' => 'bootstrap.widgets.TbButtonColumn',
      ), */
    ),
));
?>
