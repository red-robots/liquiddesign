<?php 
/* 
 * Template Name: About Single
 * @since         1.0
 * @alter         2.0
*/

get_header('full'); ?>

<div class="wrap">    
    <div id="full-page">
    
    <div class="subnavcontainer">
    <div class="header-nav">
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
    <?php } elseif (is_page('our-services')) { // Services ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'services' ) ); ?>
    <?php } elseif (is_page('leadership')) { // Leadership ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'leadership' ) ); ?>
  
    <?php } else { ?>
    no menu!
    <?php } ?>
    </div>
    </div>
    
    <div class="clearfix"></div>
    
    
        <div class="box-content post">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
	<?php if ( has_post_thumbnail() ){ 
                the_post_thumbnail('col3', array( 'class' => 'alignleft' ) );
            } ?>
            
            <div class="page-entry">
            	<h1 class="page-title"><?php the_title(); ?></h1>
                
				<?php the_content(); ?>
                
                
            </div><!-- #page-entry -->
                
            <?php endwhile; endif; ?>
        </div>
        
        <?php if(current_theme_supports('shaken_page_comments')) : 
        	comments_template( '', true ); 
        endif; ?>
        
	</div><!-- #page -->
    
</div><!-- #wrap -->
<?php get_footer('full'); ?>