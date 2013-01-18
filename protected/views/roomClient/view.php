<?php
$this->breadcrumbs = array(
    'Room Clients' => array('index'),
    $model->Id,
);

$this->menu = array(
    array('label' => 'Create RoomClient', 'url' => array('create')),
    array('label' => 'Update RoomClient', 'url' => array('update', 'id' => $model->Id)),
    array('label' => 'Delete RoomClient', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->Id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage RoomClient', 'url' => array('admin')),
);
?>

<h1>View RoomClient #<?php echo $model->Id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'type' => 'striped bordered condensed',
    'attributes' => array(
        'RoomId',
        array(
            'name' => 'ClientId',
            'value'=>CHtml::encode($model->getOneClientFullName($model->ClientId)),
        ),
        'StartDate',
        'EndDate',
        'Status',
    ),
));
?>
