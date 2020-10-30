 <?php
/*
 * Template Name: home page
*/
get_header('page'); ?>

<div class="wrap">    
    <div id="page">
        <div class="box-content post">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
			<?php if ( has_post_thumbnail() ){ 
                the_post_thumbnail('col4', array( 'class' => 'feat-img' ) );
            } ?>
            
           
                
            <?php if(current_theme_supports('shaken_page_comments')) : 
            	comments_template( '', true ); 
            endif; ?>
                
            <?php endwhile; endif; ?>
        </div>
        
	</div><!-- #page -->
    
    <?php //get_sidebar('page'); ?>
    
</div><!-- #wrap -->
<?php get_footer('page'); ?>