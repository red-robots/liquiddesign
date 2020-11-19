<?php 
/* 
 * Template Name: Leadership
 * @since         1.0
 * @alter         2.0
*/

get_header('full'); ?>

<div class="wrap">    
    <div id="full-page">
    
    <div class="subnavcontainer">
    <div class="sub-nav">
    <?php if ($post->post_parent == '154') { // Culture ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'culture' ) ); ?>
    <?php } elseif ($post->post_parent == '170') { // Services ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'services' ) ); ?>
    <?php } elseif ($post->post_parent == '216') { // SEctors ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'services' ) ); ?>
    <?php } elseif ($post->post_parent == '175') { // Leadership ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'leadership' ) ); ?>
    
    <?php } elseif (is_page('culture')) { // Culture ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'culture' ) ); ?>
    <?php } elseif (is_page('services')) { // Services ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'services' ) ); ?>
    <?php } elseif (is_page('leadership')) { // Leadership ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'leadership' ) ); ?>
  
    <?php } else { ?>
    no menu!
    <?php } ?>
    </div>
    </div>
    
    <div class="clearfix"></div>
    
    
        <div class="box-content post leadership">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
	<div class="leadership-pic">
    
    <div class="leadership-left">
        <img src="<?php bloginfo('template_url'); ?>/images/mike-standley.jpg">
    	<a href="mike-lee-standley">Mike Lee Standley</a>
    </div>
    
    <div class="leadership-right">
        <img src="<?php bloginfo('template_url'); ?>/images/michael-williams.jpg">
    	<a href="michael-willams">Michael Williams</a>
    </div>
	
</div><!-- #leadership pic --> 
            
            
            
            
            <div class="about-page-entry">
            <?php //the_content(); ?>
                
                
            </div><!-- #page-entry -->
                
            <?php endwhile; endif; ?>
        </div>
        
        
	</div><!-- #page -->
    
</div><!-- #wrap -->
<?php get_footer('full'); ?>