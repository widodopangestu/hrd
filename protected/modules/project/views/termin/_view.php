<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('percentage')); ?>:</b>
    <?php echo CHtml::encode($data->percentage); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
    <?php echo CHtml::encode($data->cost); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
    <?php echo CHtml::encode($data->summary); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
    <?php echo CHtml::encode($data->created); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
    <?php echo CHtml::encode($data->updated); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
    <?php echo CHtml::encode($data->project_id); ?>
    <br />


</div>