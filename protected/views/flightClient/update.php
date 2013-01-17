<?php
$this->breadcrumbs=array(
	'Flight Clients'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FlightClient','url'=>array('flightClientView/index')),
	array('label'=>'Create FlightClient','url'=>array('create')),
	array('label'=>'View FlightClient','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage FlightClient','url'=>array('flightClientView/admin')),
);
?>

<h1>Update FlightClient <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>