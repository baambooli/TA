<?php
$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RoomType','url'=>array('index')),
	array('label'=>'Create RoomType','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('room-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Types</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'room-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'Name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
