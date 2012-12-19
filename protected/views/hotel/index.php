<?php
$this->breadcrumbs=array(
	'Hotels',
);

$this->menu=array(
	array('label'=>'Create Hotel','url'=>array('create')),
	array('label'=>'Manage Hotel','url'=>array('admin')),
);
?>

<h1>Hotels</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
