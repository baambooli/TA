<?php
$this->breadcrumbs = array(
    'Flight Client Views' => array('index'),
    $model->FlightClientId,
);

$this->menu = array(
    array('label' => 'List FlightClient', 'url' => array('index')),
    array('label' => 'Create FlightClient', 'url' => array('flightClient/create')),
    array('label' => 'Update FlightClient', 'url' => array('flightClient/update', 'id' => $model->FlightClientId)),
    // delete does not work with GET request, so I commented this line
    //array('label' => 'Delete FlightClient', 'url' => 'flightClient/delete', 'linkOptions' => array('submit' => array('delete', 'id' => $model->FlightClientId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage FlightClient', 'url' => array('admin')),
);
?>

<h1>View FlightClientView #<?php echo $model->FlightClientId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => array(
        //'SeatId',
        'ClientName',
        'ClientFamily',
        //'ClientSex',
        //'PassportNumber',
        'Username',
        'FlightNumber',
        'SeatNumber',
        'Status',
        'SeatType',
        'Aireplane_specificationsName',
        'AirplaneName',
        'AirlineName',
        'AirlineCountryId',
        'AirlineTel',
        //'FlightId',
        'TakeoffTime',
        'TakeoffDate',
        'LandingTime',
        'LandingDate',
        'DestinationCityName',
        'DestinationAirportName',
        'DestinationAirportAddress',
        'DestinationAirportTel',
        'DepartureCityName',
        'DepartureAirportName',
        'DepartureAirportAddress',
        'DepartureAirportTel',
        //'FlightClientId',
        'AireplaneSpecificationType',
    ),
));
?>
