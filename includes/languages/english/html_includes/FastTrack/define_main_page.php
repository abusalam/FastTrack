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
