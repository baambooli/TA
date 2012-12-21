<?php
$this->breadcrumbs=array(
	'Airplanes',
);

$this->menu=array(
	array('label'=>'Create Airplane','url'=>array('create')),
	array('label'=>'Manage Airplane','url'=>array('admin')),
);
?>

<h1>Airplanes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
