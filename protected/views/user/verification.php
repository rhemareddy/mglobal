 <?php
$this->breadcrumbs = array(
    'Account' => array('profile/updateprofile'),
    'Verification',
);

?>
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if($error){?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error;?></span></p><?php }?>
    
    
    <?php if($success){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success;?></span></p><?php }?>
   <div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Verification
							</div>
    </div>
        <div class="portlet-body form">
    <form action="/profile/documentverification" method="post" class="form-horizontal" onsubmit="return validation();" enctype = "multipart/form-data">
     
        <fieldset>
            <div class="form-body">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Upload / Update ID Proof <span class="require">*</span></label>
                <div class="col-lg-6 col-xs-8 fileupload fileupload-new">
                     <div data-provides="fileupload" class="fileupload fileupload-new">
                       <span class="fileupload-new"><input type="file" id="id_proof" class="form-control11" name="id_proof"></span>
                     <div class="form_error" id="id_error"></div>
                     </div>
                    <p class="help-block">(Upload jpg ,png files only)</p>
                </div>
                <div class="col-lg-2 col-xs-4">
                        <?php 
                        if(!empty($userObject) && $userObject->id_proof!=''){?>
                        <span class="example">
                            <a href="/upload/verification-document/<?php echo $userObject->id_proof;?>" target="_blank"><img src="/upload/verification-document/<?php echo $userObject->id_proof;?>" width="50" height="50"></a></span>
                        <?php }?>
                    <div id="id_error" class="form_error"></div>
                </div>
            </div>
         
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Upload / Update Address Proof <span class="require">*</span></label>
                <div class="col-lg-6 col-xs-8 fileupload fileupload-new">
                     <div data-provides="fileupload" class="fileupload fileupload-new">
                        <span class="fileupload-new"><input type="file" id="address_proof" class="form-control11" name="address_proof"></span><div id="address_error" class="form_error"></div></div>
                    <p class="help-block">(Upload jpg ,png files only)</p>
                </div>
                   <div class="col-lg-2 col-xs-4">
                             <?php if(!empty($userObject) && $userObject->address_proff!=''){?>
                    <span class="example"><a href="/upload/verification-document/<?php echo $userObject->address_proff;?>" target="_blank"><img src="/upload/verification-document/<?php echo $userObject->address_proff;?>" width="50" height="50"></a></span>
                    <?php }?>
                     
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="master_pin" class="form-control" name="UserProfile[master_pin]">
                    <div id="master_pin_error" class="form_error"></div>
                </div>
            </div>
            </div>
        </fieldset>

        <div class="form-actions pad10 right">                     
               <input type="submit" name="submit" value="Update" class="btn orange">
                 
            </div>
    
    </form>
</div>
   </div>
    
 <p><strong>Mglobally will match your name against the name entered in your account profile. 

Any changes of name fields in your profile information will cause 'Name Validation' to be resetted.

Required: scanned copy of your Identification Document (passport or driver's license)</br>

Current status: <span style="color:#dd0808;"><?php  if($userObject->document_status==1){ echo "Verified"; }else{ echo "Not Verified";}?></span></strong></p>

 <p><strong>Mglobally will match your address against the address entered in your account profile. 

Any changes of address fields in your profile information will cause 'Address Validation' to be resetted.

Required: scanned copy of your utility bill with your name and address printed on it. A utility bill is water, gas or electricity bill sent to your residential address by your local utility company.</br>

Current status: <span style="color:#dd0808;"><?php  if($userObject->document_status==1){ echo "Verified"; }else{ echo "Not Verified";}?></span></strong></p>

</div>

<script>
      function validation()
     {
        document.getElementById("id_error").innerHTML = "";
        if(document.getElementById("id_proof").value == ''){             
            document.getElementById("id_error").innerHTML = "Please choose ID proof from your computer.";
            document.getElementById("id_proof").focus();
            return false;
        }
        
        document.getElementById("address_error").innerHTML = "";
        if(document.getElementById("address_proof").value == ''){
            document.getElementById("address_error").innerHTML = "Please choose address proof from your computer.";
            document.getElementById("address_proof").focus();
            return false;
        }
        
        if(document.getElementById("master_pin").value==''){
            document.getElementById("master_pin_error").innerHTML = "Please enter master pin.";
            document.getElementById("master_pin").focus();
            return false;
        }
    }
</script>
