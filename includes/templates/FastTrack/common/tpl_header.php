<?php
/**

 * Common Template - tpl_header.php

 *

 * this file can be copied to /templates/your_template_dir/pagename<br />

 * example: to override the privacy page<br />

 * make a directory /templates/my_template/privacy<br />

 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php<br />

 * to override the global settings and turn off the footer un-comment the following line:<br />

 * <br />

 * $flag_disable_header = true;<br />

 *

 * @package templateSystem

 * @copyright Copyright 2003-2006 Zen Cart Development Team

 * @copyright Portions Copyright 2003 osCommerce

 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0

 * @version $Id: tpl_header.php 4813 2006-10-23 02:13:53Z drbyte $

 */

?>
<?php

  // Display all header alerts via messageStack:

  if ($messageStack->size('header') > 0) {

    echo $messageStack->output('header');

  }

  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {

  echo htmlspecialchars(urldecode($_GET['error_message']));

  }

  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {

   echo htmlspecialchars($_GET['info_message']);

} else {



}

?>

<!--bof-header logo and navigation display-->

<?php

if (!isset($flag_disable_header) || !$flag_disable_header) {

?>
<div id="headerWrapper"> 
  
  <!--bof-navigation display-->
  
  <div id="navMainWrapper"> 
    <!--div id="navMain">
      <ul class="back">
        <li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>
        <?php if ($_SESSION['customer_id']) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a></li>
        <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li>
        <?php

      } else {

        if (STORE_STATUS == '0') {

?>
        <li><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li>
        <?php } } ?>
        <?php if ($_SESSION['cart']->count_contents() != 0) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo HEADER_TITLE_CART_CONTENTS; ?></a></li>
        <li><a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?></a></li>
        <?php }?>
      </ul>
    </div>
    <div id="navMainSearch">
      <?php require(DIR_WS_MODULES . 'sideboxes/search_header.php'); ?>
    </div--> 
    <br class="clearBoth" />
  </div>
  
  <!--eof-navigation display--> 
  
  <!--bof-branding display-->
  
  <div id="logoWrapper">
    <div id="logo"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT) . '</a>'; ?></div>
    <div class="box1"> 
      <!--bof custom blackbox -->
      <div class="blackbox">
        <div class="your-account">
          <div class="lock-icon"></div>
          <div class="blackbox_text" style="margin-left:15px; height:12px;"><b><span class="links"><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>">YOUR ACCOUNT</a></span></b></div>
          <div class="blackbox_text" style="margin-top:3px;"><span class="links">
            <?php if ($_SESSION['customer_id']) { echo "Welcome ";?>
            <a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo $_SESSION['customer_first_name'];?></a>!&nbsp;&nbsp; <a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a>
            <?php
      } else {
        if (STORE_STATUS == '0') { ?>
            <span class="links"> <a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a> or <a href="<?php echo zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'); ?>">Register</a>
            <?php } } ?>
            </span><br />
            Sign in for faster Shopping!</div>
        </div>
        <div class="divider"></div>
        <div class="your-account">
          <div class="phone-icon"></div>
          <div class="blackbox_text" style="margin-left:15px; height:12px;"><b><span class="links"><a href="#">SUPPORT</a></span></b></div>
          <div class="blackbox_text" style="margin-top:3px;">Call 888-339-3388<br>
            <br>
            <span class="links"> <a href="#">Email Us</a> | <a href="#">Live Chat</a></span></div>
        </div>
        <div class="divider"></div>
        <a  href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>">
        <div class="mycart"></div>
        </a> </div>
      <div class="search">
        <?php require(DIR_WS_MODULES . 'sideboxes/search_header.php'); ?>
      </div>
    </div>
    <!--eof custom blackbox --> 
    
    <!--bof MainMenu Display-->
    <div id="navMainFT"> <a href="<?php echo HTTP_SERVER.DIR_WS_CATALOG; ?>">
      <div class="menuHome"> <span><?php echo HEADER_TITLE_CATALOG; ?></span> </div>
      </a> <a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>">
      <div class="menuAccount"> <span><?php echo HEADER_TITLE_MY_ACCOUNT; ?></span> </div>
      </a> <a href="<?php echo HTTP_SERVER.DIR_WS_CATALOG; ?>">
      <div class="menuFreeShip"> <span>Free Shipping</span> </div>
      </a> <a href="<?php echo HTTP_SERVER.DIR_WS_CATALOG; ?>">
      <div class="menuQuote"> <span>Quote</span> </div>
      </a> <a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART,'','NONSSL');?>">
      <div class="menuCart"> <span><?php echo HEADER_TITLE_CART_CONTENTS;?></span> </div>
      </a> <a href="<?php echo HTTP_SERVER.DIR_WS_CATALOG.'index.php?main_page=contact_us'; ?>">
      <div class="menuContact"> <span>Contact</span> </div>
      </a> </div>
    <!--eof MainMenu Display -->
    
    <?php if (HEADER_SALES_TEXT != '' || (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2))) { ?>
    <div id="taglineWrapper">
      <?php

              if (HEADER_SALES_TEXT != '') {

?>
      <div id="tagline"><?php echo HEADER_SALES_TEXT;?></div>
      <?php

              }

?>
      <!--bof- banner #2 display tpl_header.php -->
      <?php

              if (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) {

                if ($banner->RecordCount() > 0) {

?>
      <div id="bannerTwo" class="banners"><?php echo zen_display_banner('static', $banner);?></div>
      <?php

                }

              }

?>
      <!--eof- banner #2 display tpl_header.php --> 
    </div>
    <?php } // no HEADER_SALES_TEXT or SHOW_BANNERS_GROUP_SET2 ?>
  </div>
  <br class="clearBoth" />
  
  <!--eof-branding display--> 
  
  <!--eof-header logo and navigation display--> 
  
  <!--bof SlideShow -->
  <?php 
/**
 * Slideshow creator
 *
 * @package slideshow
 * @author Vassilios Barzokas <contact@vbarzokas.com> 
 * @author website www.vbarzokas.com
 * @copyright Copyright 2011 Vassilios Barzokas
 * @license http://www.gnu.org/copyleft/gpl.html   GNU Public License V2.0
 * @version $Id: slideshow.php 1.1 2012-01-22 11:50:04Z $
 */
?>
  <script type="text/javascript">
		$(document).ready(function(){   
				$("#slider").easySlider({
						auto: true, 
						continuous: true,
						numeric: true,
						firstShow : true,
						lastShow : true,
						controlsShow: true,
						speed: 800,
						pause: 2000
				});
	   });     
</script>
  <style type="text/css">
/*bof easy slider*/
	#slider {
	margin-left:auto;
	margin-right:auto;
	position:relative;
}
#slider a {
	text-decoration:none;
}
.price {
	position: relative;
	top: -35%;
	left: 0;
}
.price_text {
	position: relative;
	top: -160px;
	left: -75px;
	width: 100px;
	height:100px;
	font-family:comic-sans;
	font-size:2em;
	font-style: italic;
	color:white;
}
#slider ul, #slider li, #slider2 ul, #slider2 li {
	margin:0;
	padding:0;
	list-style:none;
}
#slider2 {
	margin-top:1em;
}
#slider li, #slider2 li {/*define width and height of list item (slide) entire slider area will adjust according to the parameters provided here */
	width:944px;
	height:318px;
	overflow:hidden;
}
/*bof easy slider numeric controls*/    
	#control_div {
	width:400px;
	height:18px;
	position:relative;
	left:400px;
	top:-50px;
}
ol#controls {
	margin:1em 0;
	padding:0;
	height:18px;
}
ol#controls li {
	margin:0 10px 0 0;
	padding:0;
	float:left;
	list-style:none;
	height:18px;
	line-height:18px;
}
ol#controls li a {
	float:left;
	height:18px;
	line-height:18px;
	border:1px solid #ccc;
	background:#bcc0b1;
	color:#000;
	padding:0 10px;
	text-decoration:none;
}
ol#controls li.current a {
	background:#7d0b0b;
	color:#fff;
}
ol#controls li a:focus, #prevBtn a:focus, #nextBtn a:focus {
	outline:none;
}
</style>
  <?php     
			$slideshow_query = "SELECT * FROM " . TABLE_SLIDESHOW;
			$slideshow_result = $db->Execute($slideshow_query);
?>
  <div id="slider">
    <ul>
      <?php 
				while(!$slideshow_result->EOF)
				{
				?>
      <li> <a href="<?php echo $slideshow_result->fields['url']; ?>"> <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/'.$slideshow_result->fields['image']; ?>"   alt="slide image" /> <img class="price" src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/slideshow/price_bg.png'?>"   alt="slide price" /> <span class="price_text"><?php echo $slideshow_result->fields['price']?></span> </a> </li>
      <?php 
				$slideshow_result->MoveNext();
				} //end while
				?>
    </ul>
  </div>
  
  <!--eof SlideShow --> 
  <!--bof-optional categories tabs navigation display-->
  
  <?php require($template->get_template_dir('tpl_modules_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_categories_tabs.php'); ?>
  
  <!--eof-optional categories tabs navigation display--> 
  
  <!--bof-header ezpage links-->
  
  <?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
  <?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
  <?php } ?>
  
  <!--eof-header ezpage links--> 
  
</div>
<?php } ?>
