<?php
$this->breadcrumbs=array(
	'Flight Passengers'=>array('index'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FlightPassenger','url'=>array('index')),
	array('label'=>'Create FlightPassenger','url'=>array('create')),
	array('label'=>'View FlightPassenger','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage FlightPassenger','url'=>array('admin')),
);
?>

<h1>Update FlightPassenger <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>