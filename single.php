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
                <?php if(get_sub_field('info')) { 

                  $info = get_sub_field('info');

                  ?>
                  <div class="slide-info">
                    <?php the_sub_field('info'); ?>
                  </div>
                <?php } ?>
                <img src="<?php the_sub_field('slide'); ?>" />
              </li>  
            <?php endwhile; ?>
          <?php endif; ?> 
        </ul>
      </div>
    </div>
  <?php /* End: loop */
  endwhile; endif; ?>

<div class="single-info"><?php echo $info; ?></div>

</div><!-- #wrap -->
<?php //get_footer(); ?>
<?php require('footer-single.php'); ?>