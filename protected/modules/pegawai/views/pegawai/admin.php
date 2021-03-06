<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */

$this->breadcrumbs = array(
    'Pegawais' => array('admin'),
    'Kelola',
);

$this->menu = array(
    array('label' => 'Buat Pegawai', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pegawai-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Pegawais</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pegawai-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions' => array(
                'valign' => 'top',
                'width' => '2px'
            )
        ),
        'nik',
        'nama',
        'alamat',
        array(
            'name' => 'jenis_kelamin',
            'filter' => $model->getJenisKelaminOptions(),
            'value' => '$data->getJenisKelaminText()',
            'type' => 'raw',
        ),
        array(
            'name' => 'jabatan_id',
            'filter' => $model->getJabatanOptions(),
            'value' => '$data->jabatan->nama',
            'type' => 'raw',
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
