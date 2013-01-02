<?php
$this->breadcrumbs = array(
    'Room Clients' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create RoomClient', 'url' => array('create')),
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


<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'room-client-grid',
    'dataProvider' => $modelSearchHotelView->search(),
    'filter' => $modelSearchHotelView,
    'columns' => array(
        'HotelName',
        'RoomNumber',
        'ClientName',
        'ClientFamily',
        'ClientTel',
        'ClientUsername',
        'StartDate',
        'EndDate',
        'Status',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
