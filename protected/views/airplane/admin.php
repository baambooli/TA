<?php
$this->breadcrumbs = array(
    'Airplanes' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Airplane', 'url' => array('index')),
    array('label' => 'Create Airplane', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('airplane-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Airplanes</h1>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'airplane-grid',
    'type'=>'striped bordered condensed',
    'dataProvider' => $modelAirplaneView->search(),
    'filter' => $modelAirplaneView,
    'columns' => array(
        'Id',
        'AirplaneName',
        'StartDateOfWork',
        'AirlineName',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
