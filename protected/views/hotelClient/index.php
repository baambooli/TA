<?php
$this->breadcrumbs=array(
	'Hotel Clients',
);

$this->menu=array(
	array('label'=>'Create HotelClient','url'=>array('create')),
	array('label'=>'Manage HotelClient','url'=>array('admin')),
);
?>

<h1>Hotel Clients</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
