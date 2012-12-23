<?php
$this->breadcrumbs=array(
	'Flight Passengers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FlightPassenger','url'=>array('index')),
	array('label'=>'Manage FlightPassenger','url'=>array('admin')),
);
?>

<h1>Create FlightPassenger</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>