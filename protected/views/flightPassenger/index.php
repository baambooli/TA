<?php
$this->breadcrumbs=array(
	'Flight Passengers',
);

$this->menu=array(
	array('label'=>'Create FlightPassenger','url'=>array('create')),
	array('label'=>'Manage FlightPassenger','url'=>array('admin')),
);
?>

<h1>Flight Passengers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
