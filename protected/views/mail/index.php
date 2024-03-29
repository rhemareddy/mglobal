<?php
$this->breadcrumbs = array(
    'Email' => array('/mail'),
    'inbox'
);
?>
<?php

if(!empty($_GET) && $_GET['successMsg']=='1'){
    echo "<p class='success-2'><i class='fa fa-check-circle icon-success'></i><span class='span-success-2'>Your message sent successfully</span></p>";
}else{
 $_GET['successMsg'] = $successMsg;   
}
?>
<div class="row">
    <div class="col-md-12">
            <?php echo CHtml::link(Yii::t('translation', 'Compose') . ' <i class="fa fa-plus"></i>', '/mail/compose', array("class" => "btn  green margin-right-20")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Inbox'), '/mail', array("class" => "btn  green margin-right-20  orange")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Sent'), '/mail/sent', array("class" => "btn  green margin-right-20")); ?>
    </div>
</div><br/>
<div class="row">
    <div class="col-md-12">
        <style>
        table tr td.notice {
    background:#FFF6BF;
    color:#514721;
}</style>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'room-grid',
    'dataProvider' => $dataProvider,
    'enableSorting' => 'true',
    'ajaxUpdate' => true,
    'summaryText' => 'Showing {start} to {end} of {count} entries',
    'template' => '{items} {summary} {pager}',
    'itemsCssClass' => 'table table-striped table-bordered table-hover table-full-width',
    'htmlOptions'=>array('id'=>'$data->id', 'class'=>'($data->status == 1)?:btn green":"btn red"') ,
    'rowCssClassExpression'=>'($data->status == 1) ? "" : "info"',
//    'cssClassExpression' => '"success"',
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
            'name' => 'from_user_id',
            'header' => '<span style="white-space: nowrap;">Sender &nbsp; &nbsp; &nbsp;</span>',
            'value' => '$data->fromuser->full_name',
        ),
        array(
            'name' => 'subject',
            'header' => '<span style="white-space: nowrap;">Subject&nbsp;</span>',
            'value' => '$data->subject',
        ),
        array(
            'name' => 'updated_at',
            'header' => '<span style="white-space: nowrap;">Date & Time&nbsp;</span>',
            'value' => array($this, 'convertDate'),
        ),
        array(
            'name' => Yii::t('translation', 'Status'),
            'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Red\') : Yii::t(\'translation\', \'Unred\')',
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => '<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
            'template' => '{Reply}{View}',
            'htmlOptions' => array('width' => '23%'),
            'buttons' => array(
                'Reply' => array(
                    'label' => 'Reply',
                    'options' => array('class' => 'btn orange fa fa-edit margin-right15'),
                    'url' => 'Yii::app()->createUrl("/mail/reply?id=$data->id")',
                ),
                'View' => array(
                    'label' => 'View',
                    'options' => array('class' => 'fa fa-success btn default black delete'),
                    'url' => 'Yii::app()->createUrl("/mail/view", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
));
?>
    </div>
</div>