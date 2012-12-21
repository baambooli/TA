<?php
$this->breadcrumbs=array(
	'Airlines',
);

$this->menu=array(
	array('label'=>'Create Airline','url'=>array('create')),
	array('label'=>'Manage Airline','url'=>array('admin')),
);
?>

<h1>Airlines</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
