<?php
$this->breadcrumbs = array(
    'Hotels' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Hotel', 'url' => array('index')),
    array('label' => 'Create Hotel', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hotel-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hotels</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'hotel-grid',
    'type'=>'striped bordered condensed',
    'dataProvider' => $hotelsViewModel->search(),
    'filter' => $hotelsViewModel,
    'columns' => array(
        'ID',
        'HotelName',
        'Category',
        'CityName',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
