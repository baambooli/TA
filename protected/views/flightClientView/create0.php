<?php
$this->breadcrumbs=array(
	'Flight Client Views'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FlightClientView','url'=>array('index')),
	array('label'=>'Manage FlightClientView','url'=>array('admin')),
);
?>

<h1>Create FlightClientView</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>