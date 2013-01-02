<?php
$this->breadcrumbs = array(
    'Room Clients' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage RoomClient', 'url' => array('admin')),
);
?>

<h1>Create RoomClient</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>