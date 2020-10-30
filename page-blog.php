<?php
/* 
*Template Name: Blog
*/

get_header(); ?>

<div id="grid">



<div class="wrap">


<div class="clearfix"></div>
</div>



<?php /* Anything placed in #sort is positioned by jQuery Masonry */ ?>
<div class="sort">
<?php 
/**
 * Display ALL posts
*/

    $wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'blog',
    'posts_per_page' => 15,
    'paged' => $paged,
));
    if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?> 
    
    
    


    
     
    
  
    
 
    	
    	
    
    <div class="all box col1 blogpost">
        
        <div <?php post_class( 'box-content has-content' ) ?>>
           
            
                <div class="img-container blogimghover"> 
                <?php 
					// Get field Name
					$image = get_field('featured_image'); 
					$url = $image['url'];
					$title = $image['title'];
					$alt = $image['alt'];
					$caption = $image['caption'];
				 
					// thumbnail or custom size that will go
					// into the "thumb" variable.
					$size = 'col1';
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
					$height = $image['sizes'][ $size . '-height' ];
						
					?>   
                  
                  <a href="<?php the_permalink(); ?>">  
                   <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="col1 wp-post-image" />
                   </a>
               </div><!-- #img-container -->
               
               
              
              
                
           <h2 class="blogpost"><?php the_title(); ?></h2>
           
           <div class="blogpost-excerpt"><?php echo get_excerpt(125); ?></div>
            
            
            <div class="readmore"><a href="<?php the_permalink(); ?>">READ MORE</a></div>
            
            
        </div><!-- #box-content -->
    </div><!-- #box -->
    <?php endwhile; ?>
</div><!-- #sort -->

<?php // Display pagination when applicable
if (  $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-below" class="navigation">
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'shaken') ); ?></div>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&rarr;</span>', 'shaken') ); ?></div>
        <div class="clearfix"></div>
    </div><!-- #nav-below -->
<?php endif; ?>

<?php else :
/* If there are no posts */ ?>
<div id="sort">
    <div class="box">
        <div class="box-content not-found">
        <h2><?php _e('Sorry, no posts were found', 'shaken'); ?></h2>
        <?php get_search_form(); ?>
        </div><!-- #not-found -->
    </div>
</div><!-- #sort -->
<?php endif; ?>








</div><!-- #grid -->
<?php get_footer('category'); ?>