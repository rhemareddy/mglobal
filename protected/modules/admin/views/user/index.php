<style>
    .orange{margin-left: 5px;}
    </style>
<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users'
);
?>

<div class="expiration margin-topDefault">
    <a class="btn  green margin-right-20" style="float:left" href="/admin/user/add">New User +</a> 
    <!--<p>Client/ Hotel/ Bill : <?php //echo $clientObject->name;?></p>-->
    <form id="user_filter_frm" name="user_filter_frm" method="post" action="/admin/user" />
    <div class="col-md-3">
        <input type="text" name="search" id="search" class="form-control" placeholder="Enter search keyword.." value="" />
    </div>
    <input type="submit" class="btn btn-success" value="OK" name="submit" id="submit"/>
</form>

</div>

<div class="row">
    <div class="col-md-12">
        <?php if (isset($_GET['successMsg']) && $_GET['successMsg'] == '1') { ?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo "User Added Successfully"; ?></span><p><?php } ?>
        <?php if (isset($_GET['successMsg']) && $_GET['successMsg'] == '2') { ?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo "Record Deleted Successfully"; ?></span><p><?php } ?>
        <?php if (isset($_GET['successMsg']) && $_GET['successMsg'] == '3') { ?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo "User Details Updated Successfully"; ?></span><p><?php } ?>
        <?php if (Yii::app()->user->hasFlash('success')): ?>
           <p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2">
                <?php echo Yii::app()->user->getFlash('success'); ?>
               </span></p>
        <?php endif; ?>

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
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Sl.No</span>',
                    'value' => '$row+1',
                ),
                //'idJob',
                array(
                    'name' => 'name',
                    'header' => '<span style="white-space: nowrap;">Name</span>',
                    'value' => '$data->name',
                ),
                array(
                    'name' => 'full_name',
                    'header' => '<span style="white-space: nowrap;">Full Name &nbsp;</span>',
                    'value' => '$data->full_name',
                ),
                array(
                    'name' => 'phone',
                    'header' => '<span style="white-space: nowrap;">Phone &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->phone',
                ),
                array(
                    'name' => 'email',
                    'header' => '<span style="white-space: nowrap;">Email &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->email',
                ),
                array(
                    'name' => 'sponsor_id',
                    'header' => '<span style="white-space: nowrap;">Sponser Id &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->sponsor_id',
                ),
                array(
                    'name' => 'created_at',
                    'header' => '<span style="white-space: nowrap;">Created At &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->created_at)?$data->created_at:"N/A"',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),

                array(
                    'class' => 'CButtonColumn',
                    'header' => '<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
                    'template' => '{Change}{Edit}',
                    'htmlOptions' => array('width' => '20%'),
                    'buttons' => array(
                        'Change' => array(
                            'label' => Yii::t('translation', 'Change Status'),
                            'options' => array('class' => 'fa fa-success btn default green delete'),
                            'url' => 'Yii::app()->createUrl("admin/user/changestatus", array("id"=>$data->id))',
                        ),
                        'Edit' => array(
                            'label' => Yii::t('translation', 'Edit'),
                            'options' => array('class' => 'fa fa-success btn orange delete'),
                            'url' => 'Yii::app()->createUrl("admin/user/edit", array("id"=>$data->id))',
                        ),
                        /*'Delete' => array(
                            'label' => Yii::t('translation', 'Delete'),
                            'options' => array('class' => 'fa fa-success btn default red delete', 'onclick' => 'return confirm("Do u want to delete this user?");'),
                            'url' => 'Yii::app()->createUrl("admin/user/deleteuser", array("id"=>$data->id))',
                        ),*/
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>


