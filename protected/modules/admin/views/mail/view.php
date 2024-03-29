<?php
$this->breadcrumbs = array(
    'Email' => array('/admin/mail'),
    'Read'
);
?>

<div class="row">
    <div class="col-md-12">
             <?php echo CHtml::link(Yii::t('translation', 'Compose') . ' <i class="fa fa-plus"></i>', '/admin/mail/compose', array("class" => "btn  green margin-right-20")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Inbox'), '/admin/mail', array("class" => "btn  green margin-right-20")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Sent'), '/admin/mail/sent', array("class" => "btn  green margin-right-20")); ?>
    </div>
</div>
<br/>
<div class="col-md-12 form-group">
    <label class="col-md-1">Sender:</label>
    <div class="col-md-6">
        <p><?php echo $mailObject->touser->full_name; ?></p>
    </div>
</div>
<div class="col-md-12 form-group">
    <label class="col-md-1">Receiver:</label>
    <div class="col-md-6">
        <p><?php echo $mailObject->fromuser->full_name; ?></p>
    </div>
</div>
<div class="col-md-12 form-group">
    <label class="col-md-1">Subject:</label>
    <div class="col-md-6">
        <p><?php echo $mailObject->subject; ?></p>
    </div>
</div>
<div class="col-md-12 form-group">
    <label class="col-md-1">Message:</label>
    <div class="col-md-6">
        <p><?php echo $mailObject->message; ?></p>
    </div>
</div>
<?php if(!empty($mailObject->attachment)){ ?>
<div class="col-md-12 form-group">
    <label class="col-md-1">Attachement</label>
    <div class="col-md-6">
        <p><a href="<?php echo Yii::app()->getBaseUrl(true);?>/upload/attachement/<?php echo $mailObject->attachment; ?>" target="_blank">Click here to download</p>
    </div>
</div>
<?php } ?>
<div class="col-md-12">
    <label class="col-md-1">&nbsp; </label>
    <div class="col-md-6">
<a href="/admin/mail/reply?id=<?php echo(!empty($_GET['id'])) ? $_GET['id'] : "";?>" class="orange btn margin-right-20">Reply</a>
  </div>
</div>



