<?php
$this->breadcrumbs = array(
    'Template' => array('BuildTemp/templates'),
    'Logo Add',
);
?>
<div class="col-md-7 col-sm-7" id="test">
    <?php if (count($userpagesObject) < 4) { ?>
        <a href="/BuildTemp/userinput" class="btn green">Add page</a>
    <?php
    }
    if (count($userpagesObject) > 0) {
        foreach ($userpagesObject as $page) {
            ?>
            <a href="/BuildTemp/pagedit?id=<?php echo $page->id; ?>" class="btn green"><?php echo $page->page_name; ?></a>
    <?php }
} ?> 

    <a href="/BuildTemp/addlogo" class="btn green">Add Logo</a>

    <a href="/BuildTemp/addcopyright" class="btn green">Add Copy Right</a> 

<?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
<?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>




<form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">

        <fieldset>
            <legend>Add Copy Right</legend>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Copy Right</label>
                <div class="col-lg-8 fileupload fileupload-new">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <input type="text" value="<?php echo $userhasObject->copyright ? $userhasObject->copyright : ''; ?>" name="copyright"  class="form-control" id="copyright">  
                    </div>
                </div>                
            </div>

        </fieldset>

        <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Submit" class="btn red">

            </div>
        </div>
    </form>


<script type="text/javascript">
    function validation() {
        $("#logo_error").html("");
        if ($("#logo").val() == "") {
            $("#logo_error").html("Please choose logo image.");
            $("#logo").focus();
            return false;
        }
    }

</script>


