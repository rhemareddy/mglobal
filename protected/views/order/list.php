<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orders List',
);

$this->menu=array(
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
 
?>
    <?php //echo "<pre>"; print_r($orderObject);?>
       <div class="main">
      <div class="container">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
         <!-- BEGIN SIDEBAR -->
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-10 col-sm-9">
       
        <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'city-grid',
	'dataProvider'=>$dataProvider,
	'enableSorting'=>'true',
	'ajaxUpdate'=>true,
	'summaryText'=>'Showing {start} to {end} of {count} entries',
	'template'=>'{items} {summary} {pager}',
	'itemsCssClass'=>'table table-striped table-bordered table-hover table-full-width',
	'pager'=>array(
		'header'=>false,
		'firstPageLabel' => "<<",
		'prevPageLabel' => "<",
		'nextPageLabel' => ">",
		'lastPageLabel' => ">>",
	),	
	'columns'=>array(
		//'idJob',
		array(
                    'name'=>'package_id',
                    'header'=>'<span style="white-space: nowrap;">Package Name &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data->package->name)?$data->package->name:""',
		),
                array(
                    'name'=>'domain',
                    'header'=>'<span style="white-space: nowrap;">Domain &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->domain',
		),
               array(
                    'name'=>'domain_price',
                    'header'=>'<span style="white-space: nowrap;">Domain Price &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->domain_price) ? number_format($data->domain_price,2) : "N/A"',
		),
               array(
                    'name'=>'coupon_discount',
                    'header'=>'<span style="white-space: nowrap;">Coupon Discount &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->transaction->coupon_discount) ? number_format($data->transaction->coupon_discount,2) : "N/A"',
		),
                array(
                    'name'=>'start_date',
                    'header'=>'<span style="white-space: nowrap;">Start Date &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->status == 1) ? $data->start_date : "N/A"',
		),
                array(
                    'name'=>'end_date',
                    'header'=>'<span style="white-space: nowrap;">End Date &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->status == 1) ? $data->end_date : "N/A"',
		),
		array(
			'name'=>'status',
			'value'=>'($data->status == 1) ? Yii::t(\'translation\', \'Completed\') : Yii::t(\'translation\', \'Pending\')',
		),
             
		array( 
			'class'=>'CButtonColumn',
			'template'=>'{Builder}',
			'htmlOptions'=>array('width'=>'23%'),
			'buttons'=>array(
				'Builder' => array(
					'label'=>'Builder',
					'options'=>array('class'=>'btn purple fa fa-edit margin-right15'),
					'url'=>'($data->status == 1) ? Yii::app()->createUrl("/order/redirect/", array("id"=>$data->id)): ""',
				),
                             
                       ),
		),
            
            array( 
			'class'=>'CButtonColumn',
                        'template'=>'{Invoice}',
			'htmlOptions'=>array('width'=>'23%'),
			'buttons'=>array(
				'Invoice' => array(
					'label'=>'Invoice',
					'options'=>array('class'=>'btn purple fa fa-edit margin-right15','target'=>'_blank'),
					'url'=>'($data->status == 1) ? Yii::app()->createUrl("/order/invoice?id=$data->id"): ""',
				),
                       ),
		),
            
            
	),
)); ?>
                    

      </div>
    </div>
