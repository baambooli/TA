<?php
$this->breadcrumbs=array(
	'Hotel Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HotelClient','url'=>array('index')),
	array('label'=>'Manage HotelClient','url'=>array('admin')),
);
?>

<h1>Create HotelClient</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>