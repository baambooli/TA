<?php
$this->breadcrumbs = array(
    'Airplanes' => array('index'),
    $model->Name => array('view', 'id' => $model->Id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Airplane', 'url' => array('index')),
    array('label' => 'Create Airplane', 'url' => array('create')),
    array('label' => 'View Airplane', 'url' => array('view', 'id' => $model->Id)),
    array('label' => 'Manage Airplane', 'url' => array('admin')),
);
?>

<h1>Update Airplane <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>