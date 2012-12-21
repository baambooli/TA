<?php
$this->breadcrumbs=array(
	'Room Views'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomView','url'=>array('index')),
	array('label'=>'Create RoomView','url'=>array('create')),
	array('label'=>'View RoomView','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage RoomView','url'=>array('admin')),
);
?>

<h1>Update RoomView <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>