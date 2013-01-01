<?php
$this->breadcrumbs = array(
    'Airlines' => array('index'),
    $model->Name,
);

$this->menu = array(
    array('label' => 'List Airline', 'url' => array('index')),
    array('label' => 'Create Airline', 'url' => array('create')),
    array('label' => 'Update Airline', 'url' => array('update', 'id' => $model->Id)),
    array('label' => 'Delete Airline', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->Id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Airline', 'url' => array('admin')),
);
?>

<h1>View Airline #<?php echo $model->Id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'Id',
        'Name',
        'Country',
        'Address',
        'Tell1',
        'Tell2',
        'Fax',
        'Email',
    ),
));
?>
