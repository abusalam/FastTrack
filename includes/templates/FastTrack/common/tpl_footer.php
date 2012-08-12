<?php
/**

 * Common Template - tpl_footer.php

 *

 * this file can be copied to /templates/your_template_dir/pagename<br />

 * example: to override the privacy page<br />

 * make a directory /templates/my_template/privacy<br />

 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />

 * to override the global settings and turn off the footer un-comment the following line:<br />

 * <br />

 * $flag_disable_footer = true;<br />

 *

 * @package templateSystem

 * @copyright Copyright 2003-2010 Zen Cart Development Team

 * @copyright Portions Copyright 2003 osCommerce

 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0

 * @version $Id: tpl_footer.php 15511 2010-02-18 07:19:44Z drbyte $

 */

require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));

?>
<?php

if (!isset($flag_disable_footer) || !$flag_disable_footer) {

?>
<!--bof FooterBar -->

<div class="footerbar">
	<div class="contactusbox">
		<p class="footerbartext">
			<a href="#">Contact Us</a>
		</p>
		<p class="footerbartext">
			<a href="#" style="font-size: 10px; margin-top: 2px;">Call,Click or Email us</a>
		</p>
		<a href="#">
		<div class="contact_imag1"></div>
		</a> <a href="#">
		<div class="contact_imag2"></div>
		</a> <a href="#">
		<div class="contact_imag3"></div>
		</a> 
	</div>
	<div class="socialbox">
		<p class="footerbartext"> 
			<a href="#">Follow Us</a> 
		</p>
		<p class="footerbartext">
			<a href="#" style="font-size: 10px; margin-top: 2px;">Twitt us, Add us, Watch us</a>
		</p>
		<a href="#">
			<div class="twitter"></div>
		</a> 
		<a href="#">
			<div class="facebook"></div>
		</a> 
		<a href="#">
			<div class="youtube"></div>
		</a> 
	</div>
<!--bof manufacturer logos tpl_footer.php-->
<?php
global $db;
$sql = "select manufacturers_id, manufacturers_name, manufacturers_image from " . TABLE_MANUFACTURERS." limit 7";
$manufacturers = $db->Execute($sql);
if ($manufacturers->RecordCount() > 0) {
	$content = "";
	$content .= '<div class="companylogos" style="background-color:#fff;">';
  	while (!$manufacturers->EOF) {
		$content.= zen_draw_form('manufacturers_form', zen_href_link(FILENAME_DEFAULT, '', $request_type, false), 'get');
		$content .= zen_draw_hidden_field('main_page',FILENAME_DEFAULT);
		$content .= zen_draw_hidden_field('manufacturers_id', $manufacturers->fields['manufacturers_id']);
		$content .= '<input type="image" src="'.DIR_WS_IMAGES . $manufacturers->fields['manufacturers_image'].'" title="'
				.$manufacturers->fields['manufacturers_name'].'" />'.zen_hide_session_id();
		$content .= '</form>';
		$manufacturers->MoveNext();
  	}
	$content .= '</div>';
} else {
  $content='<p>Sorry, no manufacturers image found.</p>';
}
echo $content
?>
<!--eof manufacturer logos tpl_footer.php--> 
</div>
<!--eof FooterBar --> 

<!--bof-navigation display -->
<div id="navSuppWrapper">
  <div id="navSupp">
    <ul>
      <li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>
      <?php if (EZPAGES_STATUS_FOOTER == '1' or (EZPAGES_STATUS_FOOTER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
      <li>
        <?php require($template->get_template_dir('tpl_ezpages_bar_footer.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_footer.php'); ?>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>

<!--eof-navigation display --> 

<!--bof-ip address display -->

<?php

if (SHOW_FOOTER_IP == '1') {

?>
<div id="siteinfoIP"><?php echo TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR']; ?></div>
<?php

}

?>

<!--eof-ip address display --> 

<!--bof-banner #5 display -->

<?php

  if (SHOW_BANNERS_GROUP_SET5 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET5)) {

    if ($banner->RecordCount() > 0) {

?>
<div id="bannerFive" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php

    }

  }

?>

<!--eof-banner #5 display --> 

<!--bof- site copyright display -->

<div id="siteinfoLegal" class="legalCopyright"><?php echo FOOTER_TEXT_BODY; ?></div>

<!--eof- site copyright display -->

<?php

} // flag_disable_footer

?>
