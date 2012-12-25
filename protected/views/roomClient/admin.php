<?php
$this->breadcrumbs=array(
	'Room Clients'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RoomClient','url'=>array('index')),
	array('label'=>'Create RoomClient','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('room-client-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Clients</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'room-client-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'RoomId',
		'ClientId',
		'StartDate',
		'EndDate',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
