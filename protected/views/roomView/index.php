<?php
$this->breadcrumbs=array(
	'Room Views',
);

$this->menu=array(
	array('label'=>'Create RoomView','url'=>array('create')),
	array('label'=>'Manage RoomView','url'=>array('admin')),
);
?>

<h1>Room Views</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
