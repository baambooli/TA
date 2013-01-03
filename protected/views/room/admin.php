<?php
$this->breadcrumbs = array(
    'Rooms' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Room', 'url' => array('index')),
    array('label' => 'Create Room', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('room-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Rooms</h1>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'room-grid',
    'type'=>'striped bordered condensed',
    'dataProvider' => $modelRoomView->search(),
    'filter' => $modelRoomView,
    'columns' => array(
        'Id',
        'HotelName',
        'RoomNumber',
        'RoomTypeName',
        'Tell',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
