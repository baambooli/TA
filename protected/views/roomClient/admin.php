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
//very important line
// if we use $modelSearchHotelView in CLinkColumn, it does nor work
// so we should define this line
$data = $modelSearchHotelView;

$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'room-client-grid',
    'dataProvider' => $modelSearchHotelView->search(),
    'filter' => $modelSearchHotelView,
    'columns' => array(
        //'RoomClientId',
        'HotelName',
        'RoomNumber',
        //////////////////////////
        // make it a link
        array(
            'class' => 'CLinkColumn',
            // header of column
            //'header'=>'Client Name',
            'header' => "<a href='index.php?r=roomClient/admin&SearchHotelView_sort=ClientName'>Client Name</a>",
            // label that user will see
            'labelExpression' => '$data->ClientName',
            // url of the link
            'urlExpression' => 'Yii::app()->createUrl("/client/view/id/".$data->ClientId)',
            // tool tip
            'linkHtmlOptions' => array('title' => 'See the details of this client')
        ),
        //////////////////////////

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
