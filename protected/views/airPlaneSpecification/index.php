<?php
$this->breadcrumbs=array(
	'Air Plane Specifications',
);

$this->menu=array(
	array('label'=>'Create AirPlaneSpecification','url'=>array('create')),
	array('label'=>'Manage AirPlaneSpecification','url'=>array('admin')),
);
?>

<h1>Air Plane Specifications</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
