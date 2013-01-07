<?php
$this->breadcrumbs=array(
	'Search4 Empty Room Views'=>array('index'),
	$model->RoomId=>array('view','id'=>$model->RoomId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Search4EmptyRoomView','url'=>array('index')),
	array('label'=>'Create Search4EmptyRoomView','url'=>array('create')),
	array('label'=>'View Search4EmptyRoomView','url'=>array('view','id'=>$model->RoomId)),
	array('label'=>'Manage Search4EmptyRoomView','url'=>array('admin')),
);
?>

<h1>Update Search4EmptyRoomView <?php echo $model->RoomId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>