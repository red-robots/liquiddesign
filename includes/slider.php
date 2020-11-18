<?php
// specific post ID you want to pull
$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'home-page'));
			if ( have_posts() ) : the_post();

 ?>

<div id="home-slider">
<?php
// The Loop
 if( have_rows('slide') )  : ?>

<div class="flexslider home-flexslider">
        <ul class="slides">
        <?php while( have_rows('slide') ) : the_row();

				$img = get_sub_field('slide');

			?>

            <li>
            	<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
            </li>

           <?php endwhile; ?>
      	 </ul><!-- slides -->
</div><!-- .flexslider -->


         <?php endif; // end loop

         endif;
         ?>

    <?php wp_reset_postdata(); ?>

</div><!-- home slider -->