<?php
$this->breadcrumbs = array(
    'Air Plane Specifications' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List AirPlaneSpecification', 'url' => array('index')),
    array('label' => 'Manage AirPlaneSpecification', 'url' => array('admin')),
);
?>

<h1>Create AirPlaneSpecification</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>