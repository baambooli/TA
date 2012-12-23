<?php
$this->breadcrumbs=array(
	'Room Clients'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomClient','url'=>array('index')),
	array('label'=>'Create RoomClient','url'=>array('create')),
	array('label'=>'View RoomClient','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage RoomClient','url'=>array('admin')),
);
?>

<h1>Update RoomClient <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>