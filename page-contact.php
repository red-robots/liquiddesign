 <?php
/*
Template Name: Contact
*/
get_header(); ?>

<div id="grid"> 
<div class="wrap">   
    <div id="content">
        
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			
			
			
			
			<div class="about-single-pic">
            <h1 class="page-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
            
<iframe width="300" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msid=211015344836745193394.0004d047c28a55d33c5b2&amp;msa=0&amp;ie=UTF8&amp;ll=35.220205,-80.860856&amp;spn=0.012516,0.019419&amp;t=m&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?msid=211015344836745193394.0004d047c28a55d33c5b2&amp;msa=0&amp;ie=UTF8&amp;ll=35.220205,-80.860856&amp;spn=0.012516,0.019419&amp;t=m&amp;source=embed" style="color:#0000FF;text-align:left">Liquid Design</a> in a larger map</small>
            
            </div>
            
            <div class="about-page-entry">
            	
                
				<br />
                <?php echo do_shortcode('[gravityform id="1" name="Contact Us" title="false" description="false"]'); ?>
                
              
            </div><!-- #page-entry -->
                
            
                
            <?php endwhile; endif; ?>
       
        
	</div><!-- #content -->
    
    <?php //get_sidebar('page'); ?>
</div><!-- #wrap -->    
</div><!-- #grid -->
<?php get_footer('page'); ?>