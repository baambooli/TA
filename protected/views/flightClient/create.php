<?php
$this->breadcrumbs=array(
	'Flight Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FlightClient','url'=>array('flightClientView/index')),
	array('label'=>'Manage FlightClient','url'=>array('flightClientView/admin')),
);
?>

<h1>Create FlightClient</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>