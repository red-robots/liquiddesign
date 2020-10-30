<?php 
/* 
 * Template Name: About Single Full Image
 * @since         1.0
 * @alter         2.0
*/

get_header('full'); ?>


<div class="wrap">    
    <div id="full-page">
    
    <div class="subsection">
    <div class="sub-section">
    <?php if ($post->post_parent == '154') { // Culture ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'culturetitle' ) ); ?>
    <?php } elseif ($post->post_parent == '213') { // Services ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'servicestitle' ) ); ?>
    <?php } elseif ($post->post_parent == '216') { // SEctors ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'servicestitle' ) ); ?>
    <?php } elseif ($post->post_parent == '175') { // Leadership ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'leadershiptitle' ) ); ?>
    
    <?php } elseif (is_page('culture')) { // Culture ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'culturetitle' ) ); ?>
    <?php } elseif (is_page('services')) { // Services ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'servicestitle' ) ); ?>
    <?php } elseif (is_page('sectors')) { // Services ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'leadershiptitle' ) ); ?>
    <?php } elseif (is_page('leadership')) { // Leadership ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'leadershiptitle' ) ); ?>
  
    <?php } else { ?>
    no menu!
    <?php } ?>
    </div>
    </div>
    
    

<?php if (is_page(216)) {?>
<div id="sector-nav">
    		<ul>
            	<li class="live-sf"><a href="<?php bloginfo('url') ?>/about/services/sectors/live-single-family/">Live Single Family</a></li>
                <li class="live-mf"><a href="<?php bloginfo('url') ?>/about/services/sectors/live-multi-family/">Live Multifamily</a></li>
                <li class="play"><a href="<?php bloginfo('url') ?>/about/services/sectors/play">Play</a></li>
                <li class="work"><a href="<?php bloginfo('url') ?>/about/services/sectors/work">Work</a></li>
                <li class="lifestyle"><a href="<?php bloginfo('url') ?>/about/services/sectors/lifestyle">lifestyle</a></li>
                <li class="community"><a href="<?php bloginfo('url') ?>/about/services/sectors/community">Community</a></li>
        	</ul>  <!--closes ul nav -->
        </div><!--/fooer sponsors-->

<?php } ?>
<?php if ( $post->post_parent == '216' ) {?>
<div id="sector-nav">
    		<ul>
            	<li class="live-sf"><a href="<?php bloginfo('url') ?>/about/services/sectors/live-single-family/">Live Single Family</a></li>
                <li class="live-mf"><a href="<?php bloginfo('url') ?>/about/services/sectors/live-multi-family/">Live Multifamily</a></li>
                <li class="play"><a href="<?php bloginfo('url') ?>/about/services/sectors/play">Play</a></li>
                <li class="work"><a href="<?php bloginfo('url') ?>/about/services/sectors/work">Work</a></li>
                <li class="lifestyle"><a href="<?php bloginfo('url') ?>/about/services/sectors/lifestyle">lifestyle</a></li>
                <li class="community"><a href="<?php bloginfo('url') ?>/about/services/sectors/community">Community</a></li>
        	</ul>  <!--closes ul nav -->
        </div><!--/fooer sponsors-->

<?php } ?>


    
    
    
    <div class="subnavcontainer">
    <div class="sub-nav">
    <?php if ($post->post_parent == '154') { // Culture ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'culture' ) ); ?>
    <?php } elseif ($post->post_parent == '213') { // Services ID#  ?>
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

    
    
        <div class="box-content post">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
	<?php if ( has_post_thumbnail() ){ 
                the_post_thumbnail('large');
            } ?>
            
          
            
            <?php if(is_page('journey')) { ?>
            
            <div class="layover-journey">
            	<h1 class="page-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
               </div><!-- .layover --> 
               
               <?php } elseif(is_page('relationship-based')) { ?>
               
               <div class="layover-relationship">
            	<h1 class="page-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
               </div><!-- .layover --> 
               
               <?php } elseif(is_page('destination')) { ?> 
               
               <div class="layover-destination">
            	<h1 class="page-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
               </div><!-- .layover --> 
               
               <?php } elseif(is_page('sustainability')) { ?> 
               
               <div class="layover-sustainability">
            	<h1 class="page-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
               </div><!-- .layover -->
              
              <?php } else { ?>
              whoops
              <?php }  ?>
           
                
            <?php endwhile; endif; ?>
        </div>
        
        
        
	</div><!-- #page -->
    
</div><!-- #wrap -->
<?php get_footer('full'); ?>