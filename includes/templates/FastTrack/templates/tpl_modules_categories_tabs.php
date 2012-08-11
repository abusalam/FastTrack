<?php

/**

 * Module Template - categories_tabs

 *

 * Template stub used to display categories-tabs output

 *

 * @package templateSystem

 * @copyright Copyright 2003-2005 Zen Cart Development Team

 * @copyright Portions Copyright 2003 osCommerce

 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0

 * @version $Id: tpl_modules_categories_tabs.php 3395 2006-04-08 21:13:00Z ajeh $

 */

  include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORIES_TABS));
?>
<?php if (CATEGORIES_TABS_STATUS == '1' && sizeof($links_list) >= 1) { ?>

<div id="navCatTabsWrapper">
  <div id="navCatTabs">
    <ul>
	<?php// for ($i=0, $n=sizeof($links_list); $i<$n; $i++) { ?>
      <?php for ($i=0, $n=sizeof($links_list); $i<7; $i++) { ?>
	  <li class="divide">|</li>
      <li><?php echo $links_list[$i];?></li>
      <?php } ?>
	  <li class="divide">|</li>
    </ul>
	
	<div class="showbrands">
    	<a href="#">Show Brands &gt;&gt;</a>
        <a href="#">A</a>
        <a href="#">B</a>
        <a href="#">C</a>
         <a href="#">D</a>
        <a href="#">E</a>
        <a href="#">F</a>
         <a href="#">G</a>
        <a href="#">H</a>
        <a href="#">I</a>
         <a href="#">J</a>
        <a href="#">K</a>
        <a href="#">L</a>
         <a href="#">M</a>
        <a href="#">N</a>
        <a href="#">O</a>
         <a href="#">P</a>
        <a href="#">Q</a>
        <a href="#">R</a>
        <a href="#">S</a>
        <a href="#">T</a>
         <a href="#">U</a>
        <a href="#">V</a>
        <a href="#">W</a>
         <a href="#">X</a>
        <a href="#">Y</a>
        <a href="#">Z</a>
               <a href="#">ALL</a>
    </div>
  </div>
</div>
<?php } ?>
