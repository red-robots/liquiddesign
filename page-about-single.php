<?php 
/* 
 * Template Name: About Single
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
    
    
    
    
    
    
    
    
    <div class="subnavcontainer">
    <div class="header-nav">
    <?php if ($post->post_parent == '154') { // Culture ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'culture' ) ); ?>
    <?php } elseif ($post->post_parent == '216') { // SEctors ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'sectors' ) ); ?>
    
    <?php } elseif ($post->post_parent == '175') { // Leadership ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'leadership' ) ); ?>
    
    <?php } elseif (is_page('culture')) { // Culture ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'culture' ) ); ?>
    <?php } elseif (is_page('services')) { // Services ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'services' ) ); ?>
    <?php } elseif (is_page('sectors')) { // Sectors ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'sectors' ) ); ?>
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
			
	<div class="about-single-pic">
	
        <div class="the-img">
            <?php if ( has_post_thumbnail() ){ 
                the_post_thumbnail('full');
            } ?>
        </div>
    
            
            
            
<!--                     <div class="clearfix"></div>   
  <div class="spacer"></div>          
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
    <?php } elseif (is_page('leadership')) { // Leadership ID#  ?>
    <?php wp_nav_menu( array( 'theme_location' => 'leadershiptitle' ) ); ?>
  
    <?php } else { ?>
    no menu!
    <?php } ?>
    </div>
    </div>-->
    
    
    
                         <div class="clearfix"></div>   
  <div class="spacer"></div>          
 <div class="subsection">
    <div class="sub-section">
    <!-- <h1 class="page-title"><?php the_title();  ?></h1> -->
    </div>
    </div>
            
            
            </div><!-- #about single pic --> 
            
            

            
            
            
            
            
            <div class="about-page-entry">
            
            
            
            
             <?php if ( get_post_meta($post->ID, 'Title', true) ) { ?>
               
               <h1 class="page-title"><?php echo get_post_meta($post->ID, 'Title', true) ?></h1>
               
	                	<?php } else { ?> 
                        
						<h1 class="page-title"><?php the_title();  ?></h1>
                        
                        <?php } ?>
                        
                        
                         <?php if ( get_post_meta($post->ID, 'Sub Title', true) )   { ?>
               			<h2 class="page-sub-title">
               			<?php echo get_post_meta($post->ID, 'Sub Title', true) ?>
                        </h2>
                        <?php } ?>
               
	                	
            	
				
                
                
                
                
                
                
                
                
                
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