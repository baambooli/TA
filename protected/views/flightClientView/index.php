<?php
$this->breadcrumbs = array(
    'Flight Client Views',
);

$this->menu = array(
    array('label' => 'Create FlightClient', 'url' => array('flightClient/create')),
    array('label' => 'Manage FlightClient', 'url' => array('flightClientView/admin')),
);
?>

<h1>Flight Client Views</h1>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
