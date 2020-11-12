<?php
/* Single Post Template
 * @since   1.0
 * @alter   2.0
*/
get_header(); 

$obj = get_queried_object();
$terms = get_the_terms( get_the_ID(), 'studio' );
echo '<pre>';
print_r($terms);
echo '</pre>';
?>

<div class="wrap">
  <?php 
  if(have_posts()) : while(have_posts()) : the_post();

  ?>
    <!-- <div class="image-loader"> -->
    <div class="single-proj">
        <div class="all-proj">
          <a href="<?php bloginfo('url'); ?>/studio/<?php echo $terms[0]->slug; ?>"><i class="far fa-chevron-square-left"></i> Back to All <?php echo $terms[0]->name; ?> Projects</a><!--  | <a href="<?php bloginfo('url'); ?>">All Projects</a> -->
        </div>
      <div class="flexslider carousel">
        <ul class="slides">
          <?php 
          $i = 0;
          // If a Side Box is Defined....
          if(have_rows('slides')): ?>
            <?php while(have_rows('slides')): the_row(); $i++;

                if( $i == 1 ) {$info = get_sub_field('info');}
                $slide = get_sub_field('slide');
                // echo '<pre>';
                // print_r($slide);
                // echo '</pre>';

              ?>	
              <li style="background-image: url('<?php echo $slide['url'] ?>');">     &nbsp;
                <!-- <img src="<?php echo $slide['url'] ?>" alt="<?php echo $slide['alt'] ?>" /> -->
              </li>  
            <?php endwhile; ?>
          <?php endif; ?> 
        </ul>
      </div>

      
         <div class="openPanel">View Details for <?php the_title(); ?> <i class="far fa-chevron-square-up"></i></div>
        

    </div>
  <?php /* End: loop */
  endwhile; endif; ?>

<div class="panel ">
  <div type="button" class="closePanel">Close Panel <i class="far fa-times-circle"></i></div>
  <div class="interior">
    <!-- <h1><?php the_title(); ?></h1> -->
    <?php echo $info; ?>
  </div>
</div>

</div><!-- #wrap -->
<?php //get_footer(); ?>
<?php require('footer-single.php'); ?>