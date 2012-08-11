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

if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

if (function_exists('zen_register_admin_page')) {
    if (!zen_page_key_exists('slideshow')) {
        // Add slideshow to Tools menu
        zen_register_admin_page('slideshow', 'BOX_TOOLS_SLIDESHOW','FILENAME_SLIDESHOW', '', 'tools', 'Y', 17);
    }
}
?>