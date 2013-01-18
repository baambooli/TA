<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('ClientId')); ?>:</b>
    <?php echo CHtml::encode($data->getOneClientFullName($data->ClientId)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('FlightId')); ?>:</b>
    <?php echo CHtml::encode($data->getFlightsFullInfo($data->FlightId)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('SeatId')); ?>:</b>
    <?php echo CHtml::encode($data->getSeat($data->SeatId)); ?>
    <br />


</div>