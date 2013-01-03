<?php
$this->breadcrumbs=array(
	'Room Clients',
);

$this->menu=array(
	array('label'=>'Create RoomClient','url'=>array('create')),
	array('label'=>'Manage RoomClient','url'=>array('admin')),
);
?>

<h1>Room Clients</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
