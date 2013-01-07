<?php
$this->breadcrumbs=array(
	'Search4 Empty Room Views'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Search4EmptyRoomView','url'=>array('index')),
	array('label'=>'Manage Search4EmptyRoomView','url'=>array('admin')),
);
?>

<h1>Create Search4EmptyRoomView</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>