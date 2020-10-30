<?php
/* Single Post Template
 * @since   1.0
 * @alter   2.0
*/
get_header(); ?>

<div class="wrap">

<?php 
if(have_posts()) : while(have_posts()) : the_post();

	
?>


<div class="image-loader">
 
		
  <div class="flexslider carousel">
          <ul class="slides">
                
 

<?php // If a Side Box is Defined....
 if(get_field('slides')): ?>
 	<?php while(has_sub_field('slides')): ?>	
    
 <li>     
    
<!--<div class="layer1">-->
<!--<img class="pullout" src="<?php bloginfo('template_url'); ?>/images/i.png" title="Click for information">-->


<!--<br />
<span class="category-ic"><?php the_category(', '); ?></span>-->
<?php if(get_sub_field('info')) { ?>
<div class="slide-info">
<?php the_sub_field('info'); ?>
</div>
<?php } ?>

<img src="<?php the_sub_field('slide'); ?>" />




<!--</div>-->
  </li>  
	<?php endwhile; ?>
<?php endif; ?> 

    
          </ul>
        </div>
	</div>
    <?php /* End: loop */
    endwhile; endif; ?>
    
   
</div><!-- #wrap -->
<?php //get_footer(); ?>
<?php require('footer-single.php'); ?>