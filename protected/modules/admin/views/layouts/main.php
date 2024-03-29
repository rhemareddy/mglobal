<?php
$curController = @Yii::app()->controller->id;
$curAction = @Yii::app()->getController()->getAction()->controller->action->id;
$curControllerLower = strtolower($curController);
$curActionLower = strtolower($curAction);

$curControllerDisplay = $curController;
$curActionDisplay = $curAction;
if ($curControllerLower == 'user') {
    $curControllerDisplay = 'Alert';
}

if ($curActionLower == 'index') {
    $curActionDisplay = 'Listing';
}
$access = Yii::app()->user->getState('access');
$menusections = ''; //BaseClass::getmenusections ( Yii::app ()->user->getState ( 'username' ) );
$adImg = ''; //BaseClass::getadminImg ( Yii::app ()->user->getState ( 'username' ) );
$menusections ['psections'] = array(6, 7, 8, 9, 33, 4, 5);
$baseURL = "http://localhost";
$accessArr = BaseClass::getMemberAccess();
$userName = BaseClass::getUserName();
?>

<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>mGlobal | Admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link
            href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"
            rel="stylesheet" type="text/css" />
        <link
            href="/metronic/assets/plugins/font-awesome/css/font-awesome.min.css"
            rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/plugins/bootstrap/css/bootstrap.min.css"
              rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/plugins/uniform/css/uniform.default.css"
              rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="/metronic/assets/css/style-metronic.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/assets/css/style.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/assets/css/style-responsive.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/assets/css/plugins.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/assets/css/themes/default.css" rel="stylesheet"
              type="text/css" id="style_color" />
        <link href="/metronic/assets/css/custom.css" rel="stylesheet"
              type="text/css" />
        <link href="/metronic/custom/custom.css" rel="stylesheet"
              type="text/css" />
        

        <link href="/metronic/custom/custom-pagination.css" rel="stylesheet"
              type="text/css" />
        <!-- END THEME STYLES -->
        <link rel="stylesheet" type="text/css"
              href="/metronic/assets/plugins/jquery-notific8/jquery.notific8.min.css" />


        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
           <script src="/metronic/assets/plugins/respond.min.js"></script>
           <script src="/metronic/assets/plugins/excanvas.min.js"></script> 
           <![endif]-->
        <script src="/metronic/assets/plugins/jquery-1.10.2.min.js"
        type="text/javascript"></script>
        <script src="/js/jquery.ba-bbq.js" type="text/javascript"></script>
        <script src="/metronic/assets/plugins/jquery-migrate-1.2.1.min.js"
        type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script
            src="/metronic/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
        type="text/javascript"></script>
        <script src="/metronic/assets/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
        <script
            src="/metronic/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
        <script
            src="/metronic/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
        <script src="/metronic/assets/plugins/jquery.blockui.min.js"
        type="text/javascript"></script>
        <script src="/metronic/assets/plugins/jquery.cokie.min.js"
        type="text/javascript"></script>
        <script src="/metronic/assets/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <script type="text/javascript" src="/metronic/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/metronic/assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
        <script
        src="/metronic/assets/plugins/jquery-notific8/jquery.notific8.min.js"></script>
        <script src="/metronic/assets/plugins/bootbox/bootbox.min.js"
        type="text/javascript"></script>

        <script src="/metronic/assets/plugins/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="/metronic/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

        <link href="/metronic/assets/plugins/bootstrap-datepicker/datepicker.css" rel="stylesheet" type="text/css" />
        <script src="/metronic/assets/scripts/core/app.js"></script>
       <script type="text/javascript" src="/chat-admin/js/chat.js"></script>
       <script type="text/javascript" src="/js/registration.js?ver=1432543968"></script>
       <script src="/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="/ckfinder/ckfinder.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
              App.init();
                //checkLoginTime();
            });
          function OpenChatBox(userID)
            {
                 
              chatWith(userID);
            }
        </script>
        
        <link type="text/css" rel="stylesheet" media="all" href="/chat-admin/css/chat.css" />
        <!-- END JAVASCRIPTS -->


        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top" style="height:45px!important;">
          <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                
                <a class="navbar-brand" href="<?php echo Yii::app()->getBaseUrl(true); ?>" style="padding:10px;">
                     <img width="82px" src="../../../images/logo/logo.png" class="img-responsive ">
                 </a> 

                <!-- BEGIN LOGO -->
                <?php /* <a class="navbar-brand" href="/admin/">
                  <?php
                  $access = Yii::app()->user->getState('access');
                  if ($access == "manager") {
                  ?>
                  <img src="#" alt="logo"
                  class="img-responsive" />
                  <?php } else { ?>
                  <img src="#" alt="logo"
                  class="img-responsive" />
                  <?php } ?>
                  </a> */ ?>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="navbar-toggle" data-toggle="collapse"
                   data-target=".navbar-collapse"> <img
                        src="/metronic/assets/img/menu-toggler.png" alt="" />
                </a>

                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right topWallet">
                    

                    <li class="cash"><a href="/admin/wallet/fundwallet" data-toggle="tooltip" data-placement="bottom" title="Cash Wallet"> 
                            <i class="fa fa-money"></i>

                            <span class="badge badge-default">
                                <?php
                                $arrayRP = BaseClass::walletAmount('1');
                                foreach ($arrayRP as $RP) {
                                    
                                }
                                echo (!empty($arrayRP)) ? number_format($RP->fund, 2)  : "0.00";
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="commision"><a href="/admin/wallet/rpwallet" class="" data-toggle="tooltip" data-placement="bottom" title="RP  Wallet">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            <span class="badge badge-default">
                                <?php
                                $arrayFund = BaseClass::walletAmount('2');
                                foreach ($arrayFund as $fund) {
                                    
                                }
                                echo (!empty($arrayFund)) ?  number_format($fund->fund, 2)  : "0.00";
                                ?>
                            </span></a>
                    </li>

                    <li class="credit"><a href="/admin/wallet/commisionwallet" class="" data-toggle="tooltip" data-placement="bottom" title="Commission Wallet">
                            <i class="fa fa-credit-card"></i>

                            <span class="badge badge-default">
                                <?php
                                $arrayRP = BaseClass::walletAmount('3');
                                foreach ($arrayRP as $RP) {
                                    
                                }
                                echo (!empty($arrayRP)) ? number_format($RP->fund, 2) : "0.00";
                                ?>
                            </span>
                        </a>
                    </li>
                     
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="/admin/mail/" class="dropdown-toggle"  data-hover="dropdown"  title="Inbox">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <span class="badge badge-default">
                                <?php
                                $userId = Yii::app()->session['userid'];
                                $mailCount = BaseClass::getUnredMails($userId);
                                if (!empty($mailCount)) {
                                    echo $mailCount;
                                } else {
                                    echo "0";
                                }
                                ?></span>
                        </a>
                    </li>

                      
                    <!--                    <li> <a class="dropdown-toggle single_2" href="/buildtemp/managewebsite" target="_blank">Preview</li>-->

                    <!-- BEGIN NOTIFICATION DROPDOWN -->

                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->

                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->

                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true"> <span class="username">
                                   <?php
                                   $userObject = User::model()->findByPk(Yii::app()->session['userid']);
                                   if ($userObject) {
                                       echo ucfirst($userObject->name);
                                   }
                                   ?>
                            </span> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                            <a href="javascript:void(0);">
                                    <i class="fa fa-user"></i> My Profile
                            </a>
                    </li> -->
                            <li>
                                <?php if ($access == "manager") { ?>
                                    <a href="/admin/default/managerlogout"> <i class="fa fa-key"></i>
                                        Log Out
                                    </a>
<?php } else { ?>
                                    <a href="/site/logout"> <i class="fa fa-key"></i> Log Out
                                    </a>
<?php } ?> 
                            </li>
                        </ul></li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>

                <!--                <div class="pull-right inlineBlock"
                                     style="text-align: center; color: #ff0; margin-top: 2px; margin-left: 6px;">
                                    <img
                                        src="<?php echo Yii::app()->request->baseUrl . "/images/admin/"; ?>"><br />Admin
                                </div>-->

                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix"></div>
      
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu" data-auto-scroll="true"
                        data-slide-speed="200">
                        <li class="sidebar-toggler-wrapper">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler hidden-phone"></div> <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        </li>

                        <?php
                        $hotel_pmenu = 6;
                         if ((in_array($hotel_pmenu, $menusections ['psections'])) || (in_array($hotel_pmenu, $menusections ['section_ids']))) {
                                /*$hotel_subsection = array(
                                    "profile/dashboard" => "Dashboard",
//                                    "profile/summery" => "Summery",
                                );
                                $activecls = 'active';
                                if ($curAction == "dashboard") {
                                    $activecls = 'active';
                                } else {
                                    $activecls = '';
                                }
                                if ($curAction == 'dashboard')
                                    $activecls = 'active';
                                if ($curActionLower == 'simplename')
                                    $activecls = '';
                                */
                                if ($curControllerLower == "default") {
                                    $activecls = 'active';
                                } else {
                                    $activecls = '';
                                }
                                ?>
                                <li class="<?php echo $activecls; ?>"><a href="/admin/user/dashboard"><i class="fa fa-home"></i>  <span class="title">Dashboard</span>
                                        <span class="selected"></span> 
                                        <?php /*<span
                                            class="arrow <?php echo ($curAction == 'dashboard') ? "open" : ''; ?>">
                                        </span><?php */?>
                                    </a>
                                    <?php
                                    /*$menusections ['sections'] = $hotel_subsection;
                                    echo '<ul class="sub-menu">';
                                    foreach ($hotel_subsection as $hotName => $hotTitle) {
                                        if (in_array($hotTitle, $menusections ['sections'])) {
                                            if ($hotName == 'admin') {
                                                $hotName = '/index';
                                            }
                                            if ($curActionLower == 'create') {
                                                $curActionLower = 'create/type/details';
                                            }
                                            $class_content = ($curControllerLower . "/" . $curActionLower == $hotName) ? 'class="active"' : '';
                                            echo '<li ' . $class_content . '>';
                                            echo '<a href="/' . $hotName . '">' . Yii::t('translation', $hotTitle) . '</a>';
                                            echo '</li>';
                                            if ($hotName == 'admin/index') {
                                                $hotName = 'admin';
                                            }

                                            /*
                                             * if($hotName == "admin")
                                             * echo '</ul>';
                                             */
                                        /*}
                                    }
                                    echo '</ul>';
                                    */?>					
                                </li>	
                                <?php
                            }
                        if (in_array('user', $accessArr)) {
                        if ($access != "manager") {
                            $hotel_pmenu = 6;
                            if ((in_array($hotel_pmenu, $menusections ['psections'])) || (in_array($hotel_pmenu, $menusections ['section_ids']))) {
                              if (in_array('usermg', $accessArr)) {  
                                $hotel_subsection1 = array(
                                    "user/index" => "Member Management",
                                    );
                              }else{
                                    $hotel_subsection1 = array();
                                            
                                }
                                if (in_array('wallet', $accessArr)) { 
                                    $hotel_subsection2 = array(
                                      "user/wallet" => "Wallet",   
                                   );
                                }else{
                                    $hotel_subsection2 = array();
                                            
                                }
                                if (in_array('geneology', $accessArr)) { 
                                    $hotel_subsection3 = array(
                                      "user/genealogy" => "Genealogy binary",   
                                   );
                                }else{
                                    $hotel_subsection3 = array();
                                            
                                }
                                if (in_array('document', $accessArr)) { 
                                    $hotel_subsection4 = array(
                                      "user/verificationapproval" => "Document Approval",   
                                   );
                                }else{
                                    $hotel_subsection4 = array();
                                            
                                }
                                if (in_array('testimonial', $accessArr)) { 
                                    $hotel_subsection5 = array(
                                      "user/testimonialapproval" => "Testimonial Approval",  
                                   );
                                }else{
                                    $hotel_subsection5 = array();
                                            
                                }
                                 
                                $hotel_subsection = array_merge($hotel_subsection1, $hotel_subsection2, $hotel_subsection3, $hotel_subsection4, $hotel_subsection5);
                                 
                                $activecls = 'active';
                                if ($curControllerLower == "user" && $curAction != 'resetpassword' || $curControllerLower == "admin") {
                                    $activecls = 'active';
                                } else {
                                    $activecls = '';
                                }
                                if ($curControllerLower == 'user' && $curAction != 'resetpassword' && $curActionLower == 'bills')
                                    $activecls = 'active';
                                if ($curActionLower == 'simplename')
                                    $activecls = '';
                                ?>
                                <li class="<?php echo $activecls; ?>"><a href="javascript:;"> <i class="fa fa-cog"></i>
                                    <span class="title">Operation</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'user') ? "open" : ''; ?>">
                                        </span>
                                    </a>
                                    <?php
                                    $menusections ['sections'] = $hotel_subsection;
                                    echo '<ul class="sub-menu">';
                                    foreach ($hotel_subsection as $hotName => $hotTitle) {
                                        if (in_array($hotTitle, $menusections ['sections'])) {
                                            if ($hotName == 'admin') {
                                                $hotName = 'admin/index';
                                            }
                                            if ($curActionLower == 'create') {
                                                $curActionLower = 'create/type/details';
                                            }
                                            $class_content = ($curControllerLower . "/" . $curActionLower == $hotName) ? 'class="active"' : '';
                                            echo '<li ' . $class_content . '>';
                                            echo '<a href="/admin/' . $hotName . '">' . Yii::t('translation', $hotTitle) . '</a>';
                                            echo '</li>';
                                            if ($hotName == 'admin/index') {
                                                $hotName = 'admin';
                                            }

                                            /*
                                             * if($hotName == "admin")
                                             * echo '</ul>';
                                             */
                                        }
                                    }
                                    echo '</ul>';
                                    ?>					
                                </li>	
                                <?php
                             
                        }}}
                           if (in_array('mail', $accessArr)) { 
                            $billing_pmenu = 7;
                            if ((in_array($billing_pmenu, $menusections ['psections'])) || (in_array($billing_pmenu, $menusections ['section_ids']))) {
                                $billing_subsection = array(
                                    "mail" => "All"
                                );
                                ?>
                                <li
                                    class="<?php echo ($curControllerLower == 'mail') ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-envelope-o"></i> <span
                                            class="title">Mail</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'mail') ? "open" : ''; ?>">
                                        </span>
                                    </a>
                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($billing_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                        // if($ctName == "invoice")
                                        // echo '<ul class="sub-menu">';
                                        $class_billing_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';
                                        echo '<li ' . $class_billing_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
//                                        }
                                            }
                                    echo '</ul>';
                                    ?>					
                                </li>	
                                <?php
                            }
                           }
                           if (in_array('reports', $accessArr)) {
                            $reservation_pmenu = 8;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                 
                               if (in_array('userreport', $accessArr)) {  
                                $reservation_subsection1 = array(
                                    "report/" => "Registration",
                                    );
                              }else{
                                    $reservation_subsection1 = array();
                                            
                                }
                                if (in_array('reportaddress', $accessArr)) { 
                                    $reservation_subsection2 = array(
                                      "report/address" => "Member Address",  
                                   );
                                }else{
                                    $reservation_subsection2 = array();
                                            
                                }
                                if (in_array('reportsponsor', $accessArr)) { 
                                    $reservation_subsection3 = array(
                                      "report/adminsponsor" => "Admin Sponsor",   
                                   );
                                }else{
                                    $reservation_subsection3 = array();
                                            
                                }
                                if (in_array('reportpackage', $accessArr)) { 
                                    $reservation_subsection4 = array(
                                      "report/package" => "Package",   
                                   );
                                }else{
                                    $reservation_subsection4 = array();
                                            
                                }
                                if (in_array('reportverification', $accessArr)) { 
                                    $reservation_subsection4 = array(
                                      "report/verification" => "Verification",   
                                   );
                                }else{
                                    $reservation_subsection4 = array();
                                            
                                }
                                if (in_array('reporttransaction', $accessArr)) { 
                                    $reservation_subsection5 = array(
                                      "report/transaction"=>"Transaction",  
                                   );
                                }else{
                                    $reservation_subsection5 = array();
                                            
                                }
                                if (in_array('reportsocial', $accessArr)) { 
                                    $reservation_subsection6 = array(
                                      "report/socialaccount" => "Social profile",  
                                   );
                                }else{
                                    $reservation_subsection6 = array();
                                            
                                }
                                if (in_array('reportcontact', $accessArr)) { 
                                    $reservation_subsection7 = array(
                                      "report/contact" => "Contact",  
                                   );
                                }else{
                                    $reservation_subsection7 = array();
                                            
                                }
                                if (in_array('reportdeposit', $accessArr)) { 
                                    $reservation_subsection8 = array(
                                      "report/deposit" => "Deposit",  
                                   );
                                }else{
                                    $reservation_subsection8 = array();
                                            
                                }
                                if (in_array('reportrefferal', $accessArr)) { 
                                    $reservation_subsection9 = array(
                                      "report/trackrefferal" => "Refferal Invite",  
                                   );
                                }else{
                                    $reservation_subsection9 = array();
                                            
                                }
                                
                                if (in_array('reportsubscriber', $accessArr)) { 
                                    $reservation_subsection10 = array(
                                      "report/subscriber" => "Subscriber",  
                                   );
                                }else{
                                    $reservation_subsection10 = array();
                                            
                                }
                                
                                if (in_array('reportfeedback', $accessArr)) { 
                                    $reservation_subsection11 = array(
                                      "report/feedback" => "Feedback",  
                                   );
                                }else{
                                    $reservation_subsection11 = array();
                                            
                                }
                                
                                if (in_array('reportbug', $accessArr)) { 
                                    $reservation_subsection12 = array(
                                      "report/bugreport" => "Bug Report",  
                                   );
                                }else{
                                    $reservation_subsection12 = array();
                                            
                                }
                                
                                if (in_array('reportmedia', $accessArr)) { 
                                    $reservation_subsection13 = array(
                                      "report/mediacenter" => "Media Center Report",  
                                   );
                                }else{
                                    $reservation_subsection13 = array();
                                            
                                }
                                 
                                $reservation_subsection = array_merge($reservation_subsection1, $reservation_subsection2, $reservation_subsection3, $reservation_subsection4, $reservation_subsection5,$reservation_subsection6,$reservation_subsection7,$reservation_subsection8,$reservation_subsection9,$reservation_subsection10,$reservation_subsection11,$reservation_subsection12,$reservation_subsection13);
                                ?>
                                <li
                                    class="<?php echo (($curControllerLower == 'report') || ($curControllerLower == 'report')) ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-file-text-o"></i>

                                        <span class="title">Reports</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'report') ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($ctName == "report" && $curControllerLower == "report")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                            }
                           }
                            if (in_array('package', $accessArr) || in_array('package_add', $accessArr) || in_array('package_list', $accessArr)) {
                            $reservation_pmenu = 7;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                 if (in_array('package_add', $accessArr)) {  
                                $reservation_subsection1 = array(
                                    "package/add" => "Add",
                                    );
                              }else{
                                    $reservation_subsection1 = array();
                                            
                                }
                                if (in_array('package_list', $accessArr)) { 
                                    $reservation_subsection2 = array(
                                      "package/list" => "List",  
                                   );
                                }else{
                                    $reservation_subsection2 = array();
                                            
                                }
                                 
                                 
                                $reservation_subsection = array_merge($reservation_subsection1, $reservation_subsection2);
                                ?>
                                <li
                                    class="<?php echo (($curControllerLower == 'package') || ($curControllerLower == 'package')) ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-archive"></i>

                                        <span class="title">Package</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'package') ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($ctName == "report" && $curControllerLower == "package")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                            }
                            }
                            if (in_array('builder', $accessArr)) {
                            $reservation_pmenu = 7;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                $reservation_subsection = array(
                                    "BuildTemp/categoryadd" => "Category Add",
                                    "BuildTemp/categorylist" => "Category List",
                                    "BuildTemp/templatelist" => "Templates HTML",
                                );
								 
                                ?>
                                
                                
                                <li
                                    class="<?php echo ($curControllerLower == 'buildtemp') ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-building-o"></i>
                                        <span class="title">Builder</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'buildtemp') ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($ctName == "buildtemp" && $curControllerLower == "buildtemp")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                            }
                            }
                                    
                            $bases_pmenu = 4;
                            
                        ?>	
                            <!-- New Menu added here -->
                            <?php if (in_array('ads', $accessArr) || in_array('ads_add', $accessArr) || in_array('ads_list', $accessArr)) {
                             $reservation_pmenu = 9;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                if (in_array('ads_add', $accessArr)) {  
                                $reservation_subsection1 = array(
                                    "ads/add" => "Ads Add",
                                    );
                              }else{
                                    $reservation_subsection1 = array();
                                            
                                }
                                if (in_array('ads_list', $accessArr)) { 
                                    $reservation_subsection2 = array(
                                      "ads" => "Ads List",  
                                   );
                                }else{
                                    $reservation_subsection2 = array();
                                            
                                }
                                $reservation_subsection = array_merge($reservation_subsection1, $reservation_subsection2);
                                ?>
                                
                                <li
                                    class="<?php echo (($curControllerLower == 'BuildTemp') || ($curControllerLower == 'ads')) ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-slideshare"></i>

                                        <span class="title">Ads</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'BuildTemp') ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($ctName == "BuildTemp" && $curControllerLower == "BuildTemp")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                            }
                            }
                            if (in_array('memberaccess', $accessArr)) {
                            /*access menu start*/     
                            $reservation_pmenu = 9;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                $reservation_subsection = array(
                                    
                                    "UserHasAccess/members" => "Members",
                                   
                                );
                                ?>
                                
                                <li
                                    class="<?php echo (($curControllerLower == 'userhasaccess') || ($curControllerLower == 'userhasaccess')) ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-user"></i>
                                        <span class="title">Member Access</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curControllerLower == 'userhasaccess') ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($ctName == "BuildTemp" && $curControllerLower == "userhasaccess")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                            }
                            }
                       
                            
                              
                            $reservation_pmenu = 9;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                $reservation_subsection = array(
                                    
                                    "user/resetpassword" => "Change Password",
                                   
                                );
                                ?>
                                
                                <li
                                    class="<?php echo (($curAction == 'resetpassword') || ($curAction == 'resetpassword')) ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-user"></i>
                                        <span class="title">Change Password</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curAction == 'resetpassword') ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($curAction == "resetpassword" && $curControllerLower == "user")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                            }
                            /* code for news module*/
                            
                           if (in_array('news', $accessArr)) { 
                            $reservation_pmenu = 9;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                if (in_array('newsadd', $accessArr)) { 
                                $reservation_subsection1 = array(
                                    
                                    "news/add" => "Add News",
                                );
                                
                                }else{
                                    $reservation_subsection1 = array();
                                }
                                
                                if (in_array('newslist', $accessArr)) { 
                                $reservation_subsection2 = array(
                                    
                                     "news/list" => "News List",
                                );
                                
                                }else{
                                    $reservation_subsection2 = array();
                                }
                                   
                                   
                               $reservation_subsection = array_merge($reservation_subsection1, $reservation_subsection2);  
                                ?>
                               
                                <li
                                    class="<?php echo (($curAction == 'add') || ($curAction == 'edit') || ($curAction == 'list')) ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-user"></i>
                                        <span class="title">News</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo ($curAction == 'resetpassword') ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($curAction == "resetpassword" && $curControllerLower == "user")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                            }
                           }
                           
                           
                             if (in_array('summary', $accessArr)) {
                             $reservation_pmenu = 9;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                
                                 if (in_array('cashwallet', $accessArr)) {  
                                $reservation_subsection1 = array(
                                    "wallet/fundwallet" => "Cash Wallet",
                                    );
                              }else{
                                    $reservation_subsection1 = array();
                                            
                                }
                                if (in_array('rpwallet', $accessArr)) { 
                                    $reservation_subsection2 = array(
                                      "wallet/rpwallet" => "RP Wallet",  
                                   );
                                }else{
                                    $reservation_subsection2 = array();
                                            
                                }
                                if (in_array('commissionwallet', $accessArr)) { 
                                    $reservation_subsection3 = array(
                                      "wallet/commisionwallet" => "Commission Wallet",  
                                   );
                                }else{
                                    $reservation_subsection3 = array();
                                            
                                }
                                 
                                 
                                $reservation_subsection = array_merge($reservation_subsection1, $reservation_subsection2, $reservation_subsection3);
                                 
                                ?>
                                
                                <li
                                    class="<?php echo (($curAction == 'fundwallet') || ($curAction == 'rpwallet') || ($curAction == 'commisionwallet')) ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-user"></i>
                                        <span class="title">Summary</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo (($curAction == 'fundwallet') || ($curAction == 'rpwallet') || ($curAction == 'commisionwallet')) ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($curAction == "resetpassword" && $curControllerLower == "user")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                             }
                             
                            }
                            
                             
                             $reservation_pmenu = 9;
                            if ((in_array($reservation_pmenu, $menusections ['psections'])) || (in_array($reservation_pmenu, $menusections ['section_ids']))) {
                                
                                 
                                    $reservation_subsection1 = array(
                                      "SiteStatitics/getfacts" => "Statistics",  
                                   );
                                 
                                $reservation_subsection = array_merge($reservation_subsection1);
                                 
                                ?>
                                
                                <li
                                    class="<?php echo (($curAction == 'getfacts')) ? "active" : ''; ?>">
                                    <a href="javascript:;"> <i class="fa fa-user"></i>
                                        <span class="title">Home Statistics</span>
                                        <span class="selected"></span> <span
                                            class="arrow <?php echo (($curAction == 'getfacts')) ? "open" : ''; ?>">
                                        </span>
                                    </a>

                                    <?php
                                    echo '<ul class="sub-menu">';
                                    foreach ($reservation_subsection as $ctName => $ctTitle) {
//                                        if (in_array($ctTitle, $menusections ['sections'])) {
                                            if ($ctName == "search/create") {
                                                $ctName = "search/create/type/details";
                                            }
                                        if ($curAction == "resetpassword" && $curControllerLower == "user")
                                                $class_content = 'class="active"';
                                            else
                                                $class_content = ($curControllerLower . "/" . $curActionLower == $ctName) ? 'class="active"' : '';

                                            echo '<li ' . $class_content . '>';
                                        echo '<a href="/admin/' . $ctName . '">' . Yii::t('translation', $ctTitle) . '</a>';
                                            echo '</li>';
                                            if ($ctName == "search/create/type/details") {
                                                $ctName = "search/create";
                                            }
//                                        }
                                    }
                                    echo '</ul>';
                                    ?>			
                                </li>
                                <?php
                             }
                             
                            
                             
                            $bases_pmenu = 4; ?>
                            
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <span class="home-link" style="font-size:14px;float:right;"><?php echo date('Y-m-d H:i:s', strtotime('now'))."\n";?></span>
                    
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->

                    <!-- END STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE HEADER-->
                    <?php
                    $header_curController = @Yii::app()->controller->id;
                    $header_curAction = @Yii::app()->getController()->getAction()->controller->action->id;
                    $menu_cond = ($header_curController == "hotel" && $header_curAction == "index") ? false : true;
                    if ($menu_cond) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                                <ul class="page-breadcrumb breadcrumb">

                                    <li>
                                        <?php
                                        $this->widget('zii.widgets.CBreadcrumbs', array(
                                            'homeLink' => CHtml::link('Dashboard', array(
                                                '/admin/default/dashboard'
                                            )),
                                            'links' => $this->breadcrumbs
                                        ));
                                        ?>
                                    </li>

                                </ul>
                                <!-- END PAGE TITLE & BREADCRUMB-->
                            </div>
                        </div>
                    <?php } ?>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                <?php echo date("Y"); ?> &copy; mGlobal
            </div>
            <div class="footer-tools">
                <span class="go-top"> <i class="fa fa-angle-up"></i>
                </span>
            </div>
        </div>
        
    <?php /*?><div class="chatWrap">
       <span class="glyphicon glyphicon-comment"></span>
       
      <div class="chatuserList " style="display: none;">
       <?php $userObject = User::model()->findAll(array('condition'=>'status=1 AND name != "admin"','limit' => '10'));?>
         
       
       <?php foreach($userObject as $user){?>
       <p><span class="glyphicon glyphicon-user" ></span><a onclick="OpenChatBox('<?php echo $user->name;?>');"><?php echo $user->full_name; ?></a></p>
       <?php }?>
       
      </div>    
       </div> <?php */?>
        
        <!-- END FOOTER -->
        <script type="text/javascript">
            function showError(msg) {
                bootbox.alert(msg, function () {
                    //alert("Hello world callback");
                });
            }

            function showSucessMsg(msg, heading) {
                var settings = {
                    theme: 'teal',
                    // sticky: $('#notific8_sticky').is(':checked'),
                    horizontalEdge: 'top',
                    verticalEdge: 'right',
                    heading: heading,
                    life: 5000
                };
                $.notific8('zindex', 11500);
                $.notific8($.trim(msg), settings);
            }
            $(function () {
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
              $(".glyphicon-comment").click(function(){
             $(".chatuserList").toggle();
             });
              $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
        </script>
       
    </body>
    <!-- END BODY -->
</html>