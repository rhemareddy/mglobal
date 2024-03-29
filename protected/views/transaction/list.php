<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
   'Order Transaction',
);
?>

<style>
    .confirmBtn{left: 333px;
    position: absolute;
    top: 0;}
    
    .confirmOk{left: 610px;
    position: absolute;
    top: 8px;}
    .confirmMenu{position: relative;}
</style>
<div class="col-md-12">
    
        <div class="expiration margin-topDefault confirmMenu">
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/transaction/list">
    <div class="input-group input-large date-picker input-daterange">
        <input type="text" name="from" placeholder="To Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['from'] !='') ?  $_POST['from'] :  date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));?>">
        <span class="input-group-addon">
        to </span>
        <input type="text" name="to" data-provide="datepicker" placeholder="From Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['to'] !='') ?  $_POST['to'] : date('Y-m-d');?>">
    </div>
    <?php 
    /*$statusId =   1;
    if(isset($_REQUEST['res_filter'])){
      $statusId =   $_REQUEST['res_filter'];
    } ?>
    
    <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="res_filter">
                <option value="1" <?php if($statusId == 1){ echo "selected"; } ?> >Active</option>
                <option value="0" <?php if($statusId == 3){ echo "selected"; } ?> >In Active</option>
            </select>
    </div>*/?>
        <input type="submit" class="btn btn-success confirmOk" value="OK" name="submit" id="submit" style="left:340px!important;top:0px!important;"/>
    </form>

</div>
<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'state-grid',
            'dataProvider' => $dataProvider,
            'enableSorting' => 'true',
            'ajaxUpdate' => true,
            'summaryText' => 'Showing {start} to {end} of {count} entries',
            'template' => '{items} {summary} {pager}',
            'itemsCssClass' => 'table table-striped table-bordered table-hover table-full-width',
            'pager' => array(
                'header' => false,
                'firstPageLabel' => "<<",
                'prevPageLabel' => "<",
                'nextPageLabel' => ">",
                'lastPageLabel' => ">>",
            ),
            'columns' => array(
                //'idJob',
                array(
                    'name' => 'id',
                    'header'=>'No.',
                    'value'=>'$row+1',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Transaction Id &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->transaction_id)?$data->transaction_id:""',
                ),
                 array(
                    'name' => 'created_at',
                    'header' => '<span style="white-space: nowrap;">Date &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->created_at',
                ),
                 array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->user->name)?$data->user->name:""',
                ),
                 /*array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">From User &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->fromuser->full_name)?$data->fromuser->full_name:""',
                ),*/
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Actual Amt &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->actual_amount)?$data->actual_amount:""',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Paid Amt &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->paid_amount)?$data->paid_amount:""',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Used RP &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->used_rp)?$data->used_rp:""',
                ),
                 array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Coupon Discount &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->coupon_discount)?$data->coupon_discount:""',
                ),
                
            ),
        ));
        ?>
    </div>
</div>
<script>
    $(function () {
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
    </script>
