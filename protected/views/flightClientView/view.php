<?php
$this->breadcrumbs = array(
    'Flight Client Views' => array('index'),
    $model->FlightClientId,
);

$this->menu = array(
    array('label' => 'List FlightClientView', 'url' => array('index')),
    array('label' => 'Create FlightClientView', 'url' => array('create')),
    array('label' => 'Update FlightClientView', 'url' => array('update', 'id' => $model->FlightClientId)),
    array('label' => 'Delete FlightClientView', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->FlightClientId), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage FlightClientView', 'url' => array('admin')),
);
?>

<h1>View FlightClientView #<?php echo $model->FlightClientId; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'SeatId',
        'SeatNumber',
        'SeatType',
        'Aireplane_specificationsName',
        'AirplaneName',
        'AirlineName',
        'AirlineCountry',
        'AirlineTel',
        'FlightNumber',
        'FlightId',
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
        'FlightClientId',
        'ClientName',
        'ClientFamily',
        'ClientSex',
        'PassportNumber',
        'Username',
        'AireplaneSpecificationType',
    ),
));
?>
