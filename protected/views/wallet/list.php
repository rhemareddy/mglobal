<?php
/* @var $this MoneyTransferController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Wallet List',
);

$this->menu=array(
	array('label'=>'Create Wallet', 'url'=>array('create')),
	array('label'=>'Manage Wallet', 'url'=>array('admin')),
);
?>
    <?php //echo "<pre>"; print_r($orderObject);?>
       <div class="main">
      <div class="container">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
         <!-- BEGIN SIDEBAR -->
<!--          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="page-reg-page.html"><i class="fa fa-angle-right"></i> Login/Register</a></li>
              <li class="list-group-item clearfix"><a href="profile.html"><i class="fa fa-angle-right"></i> Profile</a></li>
              <li class="list-group-item clearfix"><a href="orderdetail.html"><i class="fa fa-angle-right"></i> Order List</a></li>
              <li class="list-group-item clearfix"><a href="address.html"><i class="fa fa-angle-right"></i> Address</a></li>
              <li class="list-group-item clearfix"><a href="varification.html"><i class="fa fa-angle-right"></i> Verification</a></li>
              <li class="list-group-item clearfix"><a href="testimonials.html"><i class="fa fa-angle-right"></i> Testimonials</a></li>
              <li class="list-group-item clearfix"><a href="invoice.html"><i class="fa fa-angle-right"></i> Invoice</a></li>
              
            </ul>
          </div>-->
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
       
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
                   'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">User Name &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->usertable->full_name',
		),
		array(
                   'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Total Fund &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->fund',
		),
		array(
                   'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Type &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'(($data->type == 1) ? "Fund Wallet" :
   (($data->type == 2) ? "RP Wallet" :
    (($data->type == 3) ? "Commission Wallet" : "")))',
					
  
		),
		array(
                   'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Status &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'(($data->status == 1) ? "Active" : "Inactive")',
		),
		
	),
)); ?>
                    

      </div>
    </div>