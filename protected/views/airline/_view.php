<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id' => $data->Id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
    <?php echo CHtml::encode($data->Name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Country')); ?>:</b>
    <?php echo CHtml::encode($data->Country); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
    <?php echo CHtml::encode($data->Address); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Tell1')); ?>:</b>
    <?php echo CHtml::encode($data->Tell1); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Tell2')); ?>:</b>
    <?php echo CHtml::encode($data->Tell2); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Fax')); ?>:</b>
    <?php echo CHtml::encode($data->Fax); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
      <?php echo CHtml::encode($data->Email); ?>
      <br />

     */ ?>

</div>