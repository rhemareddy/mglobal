
<table summary="" border="0" width=100%>
	<tr>
		<td width="44"><img src="images/icons/email_forward.png" width="48" height="48" alt="" border="0"></td>
		<td class="blog_admin_header">
		
			<?php echo $BLOG_CS_EXPL;?>
		
		
		</td>
	</tr>
</table>


<?php
if(SQLCount("contact_settings","WHERE user='$AuthUserName'")==0)
{
	$arrUser = DataArray("admin_users","username='$AuthUserName'");
	
	
	SQLInsert("contact_settings",array("user","email"),array($AuthUserName,$arrUser["email"]));
	
	
}
?>


<br><br>
<?php

$SubmitButtonText = $SAUVEGARDER;

$MessageTDLength = 120;
	
AddEditForm_BA
	(
	array($M_TO),
	array("email"),
	array(),
	array("textbox_40"),
	"contact_settings",
	"user",
	"'".$AuthUserName."'",
	$VALEURS_MODFIEES_SUCCESS."<br><br>"
	);
?>

<script>
var HTType="1";
var HTMessage="<?php echo $T_CONTACT_SETTINGS;?>";
document.onmousedown = HTMouseDown;
</script>
