<?php
$this->breadcrumbs=array(
	'Flight Client Views'=>array('index'),
	$model->FlightClientId=>array('view','id'=>$model->FlightClientId),
	'Update',
);

$this->menu=array(
	array('label'=>'List FlightClientView','url'=>array('index')),
	array('label'=>'Create FlightClientView','url'=>array('create')),
	array('label'=>'View FlightClientView','url'=>array('view','id'=>$model->FlightClientId)),
	array('label'=>'Manage FlightClientView','url'=>array('admin')),
);
?>

<h1>Update FlightClientView <?php echo $model->FlightClientId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>