<?php
/* 
*Template Name: About Sub
*/


get_header('full'); ?>

<div class="wrap">    
    <div id="full-page">
    
    <div class="subnavcontainer">
    <div class="sub-nav">
	    <?php if (is_page('culture')) { // Culture ID#  ?>
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
    <?php $this_page_id=$wp_query->post->ID; ?>
   <?php  /* Let's query some posts first... */
query_posts(array(
'showposts' => 1, // how many pages to show
'post_parent' => $this_page_id, // parent page
'post_type' => 'page',  // this is a page not a post
'orderby' => 'menu_order')); /// order by this order.
?>
    
        <div class="box-content post">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
	
            
            <div class="page-entry">
            	<h1 class="page-title"><?php the_title(); ?></h1>
                
				<?php the_content(); ?>
                
                <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'shaken'), 'after' => '</strong></p>', 'next_or_number' => 'number')); ?>

                <?php edit_post_link(__('Edit this post', 'shaken')); ?>
            </div><!-- #page-entry -->
                
            <?php endwhile; endif; ?>
        </div>
        
        <?php if(current_theme_supports('shaken_page_comments')) : 
        	comments_template( '', true ); 
        endif; ?>
        
	</div><!-- #page -->
    
</div><!-- #wrap -->
<?php get_footer('full'); ?>