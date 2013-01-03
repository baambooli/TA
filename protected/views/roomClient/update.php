<?php
$this->breadcrumbs = array(
    'Room Clients' => array('index'),
    $model->Id => array('view', 'id' => $model->Id),
    'Update',
);

$this->menu = array(
    array('label' => 'Create RoomClient', 'url' => array('create')),
    array('label' => 'Manage RoomClient', 'url' => array('admin')),
);
?>

<h1>Update RoomClient <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'updateMode' => 1, )); ?>