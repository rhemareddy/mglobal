<style>
    .not-found
    {
        text-align:center;
    }
    .not-found h1
    {
        font-size:85px;
        font-family:"PT Sans Narrow";
        color:#E54A1A;
        text-align: center;
    }
     .not-found img
     {
         width:35%;
     }
    .not-found h2
    {
        font-size:50px;
        font-family:"PT Sans Narrow";
        color:#E54A1A;
    }
    .not-found p
    {
        font-size:25px;
        font-family:"PT Sans Narrow";
        color:#E54A1A;
        text-align: center;
        line-height: 2;
    }
    @media screen and (max-width : 768px)
    {
        .not-found h2
    {
        font-size:35px;
        font-family:"PT Sans Narrow";
        color:#E54A1A;
        text-align: center;
    }
     .not-found img
     {
         width:75%;
     }
    }
</style>
<div class="container">
    <div class="col-md-12">
        <div class="not-found">
            <h2>OOPS! SOMETHING WENT WRONG!</h2>
            <h1><img src="../../../images/404.png"></h1>
            
            <p>It looks like that page no longer exists. Would you like to go to <a href="<?php echo Yii::app()->getBaseUrl(true); ?>">homepage</a> instead?</p>
        </div>
    </div>
</div>