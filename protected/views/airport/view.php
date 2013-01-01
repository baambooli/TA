<?php
$this->breadcrumbs = array(
    'Airports' => array('index'),
    $model->Name,
);

$this->menu = array(
    array('label' => 'List Airport', 'url' => array('index')),
    array('label' => 'Create Airport', 'url' => array('create')),
    array('label' => 'Update Airport', 'url' => array('update', 'id' => $model->Id)),
    array('label' => 'Delete Airport', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->Id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Airport', 'url' => array('admin')),
);
?>

<h1>View Airport #<?php echo $model->Id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'Id',
        'Name',
        'Address',
        array(
            'name' => 'CityId',
            'value' => CHtml::encode($model->getCityName($model->CityId)),
        ),
        'Tel1',
        'Tel2',
        'Fax',
    ),
));
?>
