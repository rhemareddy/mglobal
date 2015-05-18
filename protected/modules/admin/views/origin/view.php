<?php
/* @var $this OriginController */
/* @var $model Origin */

$this->breadcrumbs=array(
	'Origins'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Origin', 'url'=>array('index')),
	array('label'=>'Create Origin', 'url'=>array('create')),
	array('label'=>'Update Origin', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Origin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Origin', 'url'=>array('admin')),
);
?>

<h1>View Origin #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'slug',
		'added_at',
		'updated_at',
	),
)); ?>
