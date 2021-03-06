<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id' => $data->Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
    <?php echo CHtml::encode($data->Name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('StartDateOfWork')); ?>:</b>
    <?php echo CHtml::encode($data->StartDateOfWork); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('AirlineId')); ?>:</b>
    <?php echo CHtml::encode($data->getAirlineName($data->AirlineId)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('AirplaneSpecificationId')); ?>:</b>
    <?php echo CHtml::encode($data->getAirplaneSpecificationName($data->AirplaneSpecificationId)); ?>
    <br />


</div>