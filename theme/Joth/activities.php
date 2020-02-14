<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File: 		activities.php
* @Package:		GetSimple
* @Action:		Display activities from EventBrite
*
*****************************************************/


# Get this theme's settings based on what was entered within its plugin. 
# This function is in functions.php 
$innov_settings = Innovation_Settings();

# Include the header template
include('header.inc.php'); 
?>
	<div class="wrapper clearfix">
		<!-- page content -->
		<article>
			<section>
				<!-- title and content -->
				<h1><?php get_page_title(); ?></h1>
				<?php get_page_content(); ?>

				<div id="events__container">
					
				</div>
				
				<!-- page footer -->
				<div class="footer">
					<p>Published on <time datetime="<?php get_page_date('Y-m-d'); ?>" pubdate><?php get_page_date('F jS, Y'); ?></time></p>
				</div>
			</section>
			
		</article>
		
		<!-- include the sidebar template -->
		<?php include('sidebar.inc.php'); ?>
	</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="<?php get_theme_url(); ?>/assets/js/eventbrite.js"></script>
<!-- include the footer template -->
<?php include('footer.inc.php'); ?>