<?php
$this->breadcrumbs=array(
	'Flight Client Views',
);

$this->menu=array(
	array('label'=>'Create FlightClientView','url'=>array('create')),
	array('label'=>'Manage FlightClientView','url'=>array('admin')),
);
?>

<h1>Flight Client Views</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
