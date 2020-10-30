<?php
/* Single Post Template
 * @since   1.0
 * @alter   2.0
*/
get_header(); ?>

<div class="wrap">

<?php  if(have_posts()) : while(have_posts()) : the_post(); ?>


<div class="blog-single-images">
<div class="blog-single-image"> 
                <?php 
					// Get field Name
					$image = get_field('featured_image'); 
					$url = $image['url'];
					$title = $image['title'];
					$alt = $image['alt'];
					$caption = $image['caption'];
				 
					// thumbnail or custom size that will go
					// into the "thumb" variable.
					$size = 'blogposts';
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
					$height = $image['sizes'][ $size . '-height' ];
						
					?>   
                  
     <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="col1 wp-post-image" />
                
</div><!-- #img-container -->


 <?php if( have_rows('gallery') ): ?>
<?php while ( have_rows('gallery') ) : the_row(); ?>

<?php
  ++$counter;
  if($counter == 3) {
    $postclass = 'bgi-3';
    $counter = 0;
  } else { $postclass = 'bgi-1'; }
  
  ++$imagecounter;
?>

 <?php 
					// Get field Name
					$images = get_sub_field('images'); 
					$urls = $images['url'];
					$titles = $images['title'];
					$alts = $images['alt'];
					$captions = $images['caption'];
				 
					// thumbnail or custom size that will go
					// into the "thumb" variable.
					$sizes = 'thumbnail';
					$bigsize = 'large';
					$thumbs = $images['sizes'][ $sizes ];
					$bigthumbs = $images['sizes'][ $bigsize ];
					$widths = $images['sizes'][ $sizes . '-width' ];
					$heights = $images['sizes'][ $sizes . '-height' ];
						
					?> 
                    
                    
     <div class="blog-gallery  <?php echo $postclass; ?>">
     <a href="<?php echo $urls; ?>" class="liquidgallery">  
                   <img src="<?php echo $thumbs; ?>" alt="<?php echo $alts; ?>" title="<?php echo $titles; ?>" width="<?php echo $widths; ?>" height="<?php echo $heights; ?>"  />
                   </a>
      </div><!-- blog gallery -->
      
      
                <?php endwhile; endif; ?>
                
          </div><!-- blog single images -->


<div class="blog-single-content">
<h1><?php the_title(); ?></h1>
	<?php if(get_field('place_of_post')!="") : ?>
    	<div class="placeofpost"><?php the_field('place_of_post'); ?></div>
    <?php endif; ?>
    <div class="date"><?php echo get_the_date(); ?></div>
<?php the_content(); ?>

<div class="meta">
Posted In: 
<?php  
/* Will pull the terms of your Custom Taxonomy 
that is associated with this individual Custom
Post Type. */
$terms = get_the_terms( $post->ID, 'categorized' );
    foreach ( $terms as $term ) {
       echo "<li>" . '<a href="' . get_term_link( $term ) . '">'  . $term->name . '</a>' . "</li>";
} ?>
</div><!-- meta -->  

</div><!-- blog single content -->

<?php endwhile; endif; ?>
    
   
</div><!-- #wrap -->
<?php //get_footer(); ?>
<?php require('footer-single.php'); ?>