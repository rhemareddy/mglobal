<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templatelist'),
    'Template Body Add',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
   
    <form action="/admin/BuildTemp/templatebodyadd" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Add Template Body</legend>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Body Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="body_code" class="form-control" name="Template[body_code]" ></textarea>
                    <span id="header_code_error"></span>
                </div>
            </div>
            
           
             
        </fieldset>

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Submit" class="btn red">
                 
            </div>
        </div>
    </form>
</div>





<script type="text/javascript">
    function validation()
    {
      $("#header_code_error").html("");
      if ($("#body_code").val() == "") {
      $("#header_code_error").html("Enter Body Code");
      $("#body_code").focus();            
      return false;
    }
    }
    </script>
     
     
