<?php
$this->breadcrumbs=array(
	'Flights',
);

$this->menu=array(
	array('label'=>'Create Flight','url'=>array('create')),
	array('label'=>'Manage Flight','url'=>array('admin')),
);
?>

<h1>Flights</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
