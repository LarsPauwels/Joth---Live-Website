<?php
/*
Plugin Name: Hello World
Description: Echos "Hello World" in footer of theme
Version: 1.0
Author: Chris Cagle
Author URI: http://www.cagintranet.com/
*/
 
# get correct id for plugin
$thisfile=basename(__FILE__, ".php");
 
# register plugin
register_plugin(
	$thisfile, //Plugin id
	'Grey Admin Theme', 	//Plugin name
	'1.2', 		//Plugin version
	'Mateusz Skrzypczak',  //Plugin author
	'https://multicolor.stargard.pl/', //author website
	'Next Grey Admin Theme', //Plugin description
	'plugins', //page type - on which admin tab to display
	'grey_active'  //main function (administration)
);
 
# activate filter 
add_action('header','grey_style'); 
add_action(' index-login ','grey_style'); 


register_style('greystyle', $SITEURL.'plugins/greyTheme/css/style.css', GSVERSION, 'screen');
 queue_style('greystyle',GSBACK); 

 
 
register_script('greyscript', $SITEURL.'plugins/greyTheme/js/script.js', '0.1', TRUE);


queue_script('greyscript', GSBACK); 
 
 

 

# add a link in the admin tab 'theme'
add_action('plugins-sidebar','createSideMenu',array($thisfile,'Grey active settings'));



 
# functions
function grey_style() {
 $plugin_id = 'greytheme';
 
// Set up the folder name and its permissions
// Note the constant GSDATAOTHERPATH, which points to /path/to/getsimple/data/other/
$folder        = GSDATAOTHERPATH . '/' . $plugin_id . '/';
$bodycolorfile  = $folder . 'bodycolor.txt';
$sidebarcolorfile  = $folder . 'sidebarcolor.txt';
$bodyfontsizefile = $folder . 'bodyfontsize.txt';
$owncssfile = $folder . 'owncss.txt';

echo'
<style>

body{font-size:'.file_get_contents($bodyfontsizefile).' !important;}

#header{ background:linear-gradient(to bottom,'.file_get_contents($sidebarcolorfile).' ,#111  )!important }
</style>

';
	
}
 
function grey_active() {
	
	
	 
 

 $plugin_id = 'greytheme';
 
// Set up the folder name and its permissions
// Note the constant GSDATAOTHERPATH, which points to /path/to/getsimple/data/other/
$folder        = GSDATAOTHERPATH . '/' . $plugin_id . '/';
$sidebarcolorfile  = $folder . 'sidebarcolor.txt';
$bodyfontsizefile = $folder . 'bodyfontsize.txt';
$owncssfile = $folder . 'owncss.txt';

$chmod_mode    = 0755;
$folder_exists = file_exists($folder) || mkdir($folder, $chmod_mode);


	
	
	
	echo '<b>Grey Admin Theme</b> by multicolor (Mateusz Skrzypczak)';
	echo'<p style="margin-top:30px;font-size:24px;font-weight:bold;">Settings </p>';
	echo'	 <form  action="#" style="margin:0 auto; " method="POST">'.

	'
<b>body fontsize (default:0.8rem):</b><br>
  <input type="text" name="bodyfontsize" value="'.file_get_contents($bodyfontsizefile).'" style="width:100%;padding:5px;"><br>
	<br> 
  <b>sidebar color (#hex color): </b><br>
   <input type="text" name="sidebarcolor" value="'.file_get_contents($sidebarcolorfile).'"style="width:100%;padding:5px;"><br>
   <br>
    <b>custom css</b><br>
   <textarea    name="owncss" style="width:100%;max-width:100% !improtant;height:200px;"  >
   '.file_get_contents($owncssfile).'
   
   </textarea><br>
   <br>
   
   <input type="submit" value="save settings" name="submit" class="submit">
   
'.'</form>';



 if(isset($_POST['submit'])){
$bodyfontsize = $_POST['bodyfontsize'];
$sidebarcolor = $_POST['sidebarcolor'];
$owncss = $_POST['owncss'];

  file_put_contents($sidebarcolorfile  ,$sidebarcolor );
  file_put_contents($bodyfontsizefile  ,$bodyfontsize );
  file_put_contents( $owncssfile ,$owncss );

};

}
?>