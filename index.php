<?php
/* Frontpage (Blog)
 *
 * @since   1.0
 * @alter   1.6
*/

get_header(); ?>

<div id="grid">

<div class="wrap">
<div id="homepagecontainer">
<?php get_template_part('includes/slider'); ?>
<?php //if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '394' ); ?>
<?php //if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '405' ); ?>
</div>
<?php if ( function_exists('display_instagram') ) { ?>
	<div class="insta">
		<div class="insta-inside">
			<?php echo do_shortcode('[instagram-feed]'); ?>
		</div>
	</div>
<?php } ?>
</div>
<div class="clearfix"></div>



</div><!-- #grid -->
    
<?php get_footer(); ?>