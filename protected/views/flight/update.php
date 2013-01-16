<?php
$this->breadcrumbs = array(
    'Flights' => array('index'),
    $model->Id => array('view', 'id' => $model->Id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Flight', 'url' => array('index')),
    array('label' => 'Create Flight', 'url' => array('create')),
    array('label' => 'View Flight', 'url' => array('view', 'id' => $model->Id)),
    array('label' => 'Manage Flight', 'url' => array('admin')),
);
?>

<h1>Update Flight <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>