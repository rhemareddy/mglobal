<?php $this->renderPartial('../mailTemp/header'); ?>
<tr>
    <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> Hello <?php echo ucfirst($userObjectArr['full_name']); ?></td>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

<!-- text description -->
<tr>
    <td valign="" bgcolor="#fafafa" height="" align="left" style="line-height:0px; font-size:16px">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #3fb90f; font-size:16px; font-family:'Nunito'">
                                        Thank you for signing up with us
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        Your email address <a href="" style="color:#f15c2b; display:inline"><?php //echo $model->email; ?></a>, has been set as the Registrant contact on <p style="color:#f15c2b; display:inline">mglobally </p>.com for UserName :<strong> <?php //echo $model->name; ?> </strong> . To verify your email address, please click on the following link.
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>

                                <?php $this->renderPartial('../mailTemp/footer'); ?>