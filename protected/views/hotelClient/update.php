<?php
$this->breadcrumbs=array(
	'Hotel Clients'=>array('index'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HotelClient','url'=>array('index')),
	array('label'=>'Create HotelClient','url'=>array('create')),
	array('label'=>'View HotelClient','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage HotelClient','url'=>array('admin')),
);
?>

<h1>Update HotelClient <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>