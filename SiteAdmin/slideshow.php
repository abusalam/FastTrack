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
 
require('includes/application_top.php');
require(DIR_WS_MODULES . 'prod_cat_header_code.php');

	if ( isset($_POST['slide']) )
	{
		$slide=$_POST['slide'];
	}
	
	if ( isset($_FILES["file"]["name"]) )
	{
		$image=$_FILES["file"]["name"];
	}
	
	if ( isset($_POST['url']) )
	{
		$url=$_POST['url'];
	}
	
	if ( isset($_POST['slide_remove']) )
	{
		$slide_remove=$_POST['slide_remove'];
	}
	
	if ( isset($_POST['slide_edit']) )
	{
		$slide_edit = $_POST['slide_edit'];
	}
	
	if ( isset($_POST['price']) )
	{
		$price=$_POST['price'];
	}
	
	echo '<table border="0" width="100%" cellspacing="2" cellpadding="1" align="center">' . "\n";
	if ( (isset($_POST["submit"])) && ($_FILES["file"]["name"] != "") )
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Error Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			if (file_exists("../includes/templates/" . $template_dir . "/images/slideshow/" . $_FILES["file"]["name"]))
			{
				$messageStack->add_session('Error: File ' . $_FILES["file"]["name"] . ' already exists', 'caution');
				zen_redirect(zen_href_link('slideshow'));
			}
			else
			{
				$slideshow_query = "INSERT INTO " . TABLE_SLIDESHOW. "(image,url,price) VALUES ('$image','$url','$price')";
				$slideshow_result = $db->Execute($slideshow_query );
				move_uploaded_file($_FILES["file"]["tmp_name"],"../includes/templates/" . $template_dir . "/images/slideshow/" . $_FILES["file"]["name"]);
				echo '<tr class="infoBoxContent"><td class="dataTableHeadingContent"><b>Stored Succesfully in</b>: ' . '../includes/templates/" . $template_dir . "/images/slideshow/' . $_FILES["file"]["name"] . '</td></tr></table>' . "\n\n";;
				echo '<br />';
				$filename=$_FILES["file"]["name"];
			}
		}
	}
	elseif ( (isset($_POST["remove"])) && (isset($_POST['slide_remove'])) )
	{
		$slideshow_query = "DELETE FROM " . TABLE_SLIDESHOW. " WHERE " . TABLE_SLIDESHOW. ".image='$slide_remove'";
		$slideshow_result = $db->Execute($slideshow_query );
		if( $slide_remove != "")
		{
			unlink('../includes/templates/' . $template_dir . '/images/slideshow/'.$slide_remove);
		}
		echo '<tr class="infoBoxContent"><td class="dataTableHeadingContent">Deleted picture  with name:' . $slide_remove . '</td></tr></table>' . "\n\n";
	}
	elseif ( (isset($_POST["edit"])) && (isset($_POST['slide_edit'])) )
	{
		$slideshow_query = "UPDATE " . TABLE_SLIDESHOW. " SET price='$price' WHERE " . TABLE_SLIDESHOW.".image='$slide_edit' ";
		$slideshow_result = $db->Execute($slideshow_query );
		echo '<tr class="infoBoxContent"><td class="dataTableHeadingContent">Updated picture  with name:' . $slide_edit . '</td></tr></table>' . "\n\n";
	}
	echo '</table>';
?>


<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script type="text/javascript">
  <!--
	function init()
	{
		cssjsmenu('navbar');
		if (document.getElementById)
		{
		  var kill = document.getElementById('hoverJS');
		  kill.disabled = true;
		}
		if (typeof _editor_url == "string")
		{
			HTMLArea.replaceAll();
		}
	}
  // -->
</script>
<?php if ($editor_handler != '') include ($editor_handler); ?>
</head>

<!-- body //-->
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onLoad="init()">
<div id="spiffycalendar" class="text"></div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="10" cellpadding="5" cellspacing="0" width="100%" align>
	<th>Insert Slide</th>
	<th>Remove Slide</th>
	<th>Edit Slide Price</th>
	<tr>
	<td align="left" valign="top" width="300">
		<form name="insert" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="file" id="file" /> 
			<br/>
			<label>Url</label>
			<input type="text" name="url"></input>
			<label>Price</label>
			<input type="text" name="price"></input>
			<br/>
			<input type="submit" name="submit" value="insert" />
		</form>
	</td>
		
	<td align="left" valign="top" width="300">
	<?php 
			$slideshow_contents_query = "SELECT * FROM " . TABLE_SLIDESHOW. " ORDER BY image";
			$slideshow_contents_result = $db->Execute($slideshow_contents_query);
	?>
		<form name="remove" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<select name="slide_remove" id="slide_remove">
				<option selected value=''>Select Filename</option>
				<?php 
				while(!$slideshow_contents_result->EOF) 
				{
				?>
					<option value="<?php echo $slideshow_contents_result->fields['image']?>"> <?php echo $slideshow_contents_result->fields['image']?> </option>";
				<?php
					$slideshow_contents_result->MoveNext();
				}
				?>
			</select>
			<br />
			<input type="submit" name="remove" value="remove" />
		</form>
	</td>
	
	<td align="left" valign="top" width="300">
	<?php 
			$slideshow_contents = "SELECT * FROM " . TABLE_SLIDESHOW. " ORDER BY image";
			$slideshow_contents_result = $db->Execute($slideshow_contents);
	?>
		<form name="edit" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<select name="slide_edit" id="slide_edit">
				<option selected value=''>Select Filename</option>
				<?php 
				while(!$slideshow_contents_result->EOF) 
				{
				?>
					<option value="<?php echo $slideshow_contents_result->fields['image']?>"> <?php echo $slideshow_contents_result->fields['image']?> </option>";
				<?php
					$slideshow_contents_result->MoveNext();
				}
				?>
			</select>
			<label>Price</label>
			<input type="text" name="price" id="price" />
			<br />
			<input type="submit" name="edit" value="edit" />
		</form>
	</td>
	</tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->

</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>