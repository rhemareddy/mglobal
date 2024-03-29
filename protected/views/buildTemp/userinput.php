<?php
$this->breadcrumbs = array(
    'Page Add',
);
//print_r($_SESSION); die;
?>
<div class="col-md-12 col-sm-12" id="test">
    <?php if ($error) { ?><p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error; ?></span></p><?php } ?>
    <?php if ($success) { ?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success; ?></span></p><?php } ?>
    <div class="row pageBox">
        <?php foreach ($userpagesObject as $page) { ?>
            <a href="/BuildTemp/pagedit?id=<?php echo $page->id; ?>" class="btn orange">
                <?php echo $page->page_name; ?>
        </a><?php } ?> </div>   
    <?php echo BaseClass::buildWebsiteHeader(); ?> 
            
    <div class="row">
    <form action="/BuildTemp/pageadd" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">

        <fieldset>
            <legend>Add Pages</legend>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="lastname">Page Title<span class="require">*</span></label>
                <div class="col-lg-6">
                    <input id="page_name" type="text" class="form-control" name="pages[page_name]">
                    <span id="page_title_error"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="lastname">Page Content<span class="require">*</span></label>
                <div class="col-lg-10">
                    <textarea id="editor1" class="form-control" name="pages[page_content]" style="width: 482px; height: 248px;"></textarea>
                    <span id="page_content_error"></span>
                </div>
            </div>

        </fieldset>

        <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Submit" class="btn orange">

            </div>
        </div>
    </form>
    </div>
</div>




<script type="text/javascript">
    function validation()
    {
        $("#page_title_error").html("");
        if ($("#page_name").val() == "") {
            $("#page_title_error").html("Please enter page title.");
            $("#page_name").focus();
            return false;
        }

//    $("#page_content_error").html("");
//      if ($("#editor1").val() == "") {
//      $("#page_content_error").html("Please enter page content.");
//      $("#editor1").focus();            
//      return false;
//    }
    }

</script>
<script type="text/javascript">
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    CKFinder.setupCKEditor(editor, '../');
</script>

