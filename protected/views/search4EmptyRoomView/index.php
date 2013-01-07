<?php
$this->breadcrumbs=array(
	'Search4 Empty Room Views',
);

$this->menu=array(
	array('label'=>'Create Search4EmptyRoomView','url'=>array('create')),
	array('label'=>'Manage Search4EmptyRoomView','url'=>array('admin')),
);
?>

<h1>Search4 Empty Room Views</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
