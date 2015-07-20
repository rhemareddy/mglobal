<?php
 $this->breadcrumbs = array(
    'Confirm',
);
 $amount = base64_decode($_GET['am']);
 $transactionId = base64_decode($_GET['tId']);
?>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2-metronic.css"/>

<div class="col-md-6 col-sm-6">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
  <div class="portlet box orange ">
    <div class="portlet-title">
							<div class="caption">
								Confirm Payment
							</div>
    </div>
 <div class="portlet-body form">
        <fieldset> 
           <div class="form-body">  
            <form name="walletform" id="walletform">
               
               <div class="form-group row">
                    <label for="paid_amount" class="col-lg-4 control-label">Make Payment Using</label>
                    <div class="col-lg-8">
                          <div class="payChoose col-sm-6">
                              <div class="payOption clearfix">
                                    <div class="col-sm-12 col-xs-12 tleft" id="cashpaypal">
                                        <input type="radio" id="myRadio" name="myRadio" value="paypal" class="" style="margin-left:0px!important;">
                                        <label for="myRadio">Paypal</label>

                                    </div>
                                </div>
                              </form>   
                        <form action="<?php echo Yii::app()->params['paypalurl']; ?>" method="post" id="frmPayPal">
                            <input type="hidden" name="business" value="nehanidhi.2008@gmail.com">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="item_name" value="cashwallet">
                            <input type="hidden" name="item_number" value="1">
                            <input type="hidden" name="credits" value="">
                            <input type="hidden" name="userid" value="<?php echo Yii::app()->session['userid']; ?>">
                            <input type="hidden" name="amount" value="<?php if(!empty($_GET['am'])){ echo $amount;}?>" id="ppamount">
                            <input type="hidden" name="no_shipping" value="1">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="handling" value="0">
                            <input type="hidden" name="cancel_return" value="<?php echo Yii::app()->params['walletReturnUrl']; ?>?transaction_id=<?php echo $transactionId; ?>&status=cancelled">
                            <input name="notify_url" value="<?php echo Yii::app()->params['walletReturnUrl']; ?>/PayPal/ipn.php" type="hidden">
                            <input type="hidden" id="return" name="return" value="<?php echo Yii::app()->params['walletReturnUrl']; ?>?transaction_id=<?php echo $transactionId; ?>&status=success">
                        </form>
                    </div>
                       <span id="email_error" style="color:red"></span>
                    </div>
                    
                </div>
                </div>
            </fieldset>
             
        <div class="form-actions right">                     
           <input type="button"  name="transfer" id="transfer" class="btn orange" value="Confirm" onClick="validationfrom();"/>                     
 <div id="loading2" style="display:none;" class="loader">Don't click back button or refresh page...your transaction is in process</div>
               
                </div>
            </div>
      
 
    
</div></div>
<script type="text/javascript" src="/metronic/assets/plugins/select2/select2.min.js"></script>
<style>
        #s2id_search_username{ width: 100% !important;}
</style>
<script>
    function validationfrom()
    {
        var group = document.walletform.myRadio;
        var valx = $('input[name=myRadio]:checked').val();
       if (group.checked == false)
       {
         alert('Please choose payment gateway.');
         return false;
      }else{
        $("#frmPayPal").submit();
    }
        document.getElementById('transfer').style.display="none";
    document.getElementById('loading2').style.display="block";
    }
  
</script>
