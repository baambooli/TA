<?php
$this->breadcrumbs = array(
    'Flight Clients',
);

$this->menu = array(
    array('label' => 'Create FlightClient', 'url' => array('create')),
    array('label' => 'Manage FlightClient', 'url' => array('admin')),
);
?>

<h1>Flight Clients</h1>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
