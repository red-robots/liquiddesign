<?php
/* 
*Template Name: About
*/

get_header(); 

$pContent = get_the_content();

?>

<div id="grid">
<?php $this_page_id=$wp_query->post->ID; ?>

<?php 
/**
 * Display ALL posts
/* Let's query some posts first... */
query_posts(array(
'showposts' => 40, // how many pages to show
'post_parent' => $this_page_id, // parent page
'post_type' => 'page',  // this is a page not a post
'orderby' => 'menu_order')); /// order by this order.

/* Say hello to the Loop... */
//query_posts( 'cat=5&posts_per_page=50' );
if ( have_posts() ) : 

/* Anything placed in #sort is positioned by jQuery Masonry */ ?>
<div class="sort">
    
     
    
  
    
    <?php while ( have_posts() ) : the_post(); 
    	
    	global $my_size, $force_feat_img, $embed_code, $vid_url;
    	
        // Gather custom fields
        $embed_code = get_post_meta($post->ID, 'soy_vid', true);
        $vid_url = get_post_meta($post->ID, 'soy_vid_url', true);
        $force_feat_img = get_post_meta($post->ID, 'soy_hide_vid', true);
        $show_title = get_post_meta($post->ID, 'soy_show_title', true);
        $show_desc = get_post_meta($post->ID, 'soy_show_desc', true);
        $box_size = get_post_meta($post->ID, 'soy_box_size', true); 
        
        if( $box_size == 'Medium (485px)' ){
            $my_size = 'col3';
            $embed_size = '495';
        } else if( $box_size == 'Large (660px)' ){
            $my_size = 'col4';
            $embed_size = '670';
        } else if( $box_size == 'Tiny (135px)' ){
            $my_size = 'col1';
            $embed_size = '145';
        }else{
            $my_size = 'col2';
            $embed_size = '320';
        }
        
        /* Check whether content is being displayed
         * This determines whether a border should be applied
         * above the postmeta section
        */
        if($show_title != 'No'){
            $content_class = 'has-content';
        } else if($show_desc != 'No' && $post->post_content){
            $content_class = 'has-content';
        }else {
            $content_class = 'no-content';
        }
        
        // Assign categories as class names to enable filtering
        $category_classes = '';
        
        foreach( ( get_the_category() ) as $category ) {
            $category_classes .= $category->category_nicename . ' ';
        } 
    ?>
    
    <div class="all box col1<?php //echo $category_classes . $my_size; ?>">
        
        <div <?php post_class( 'box-content '.$content_class ) ?>>
            <?php 
            // Display video if available
            if( ( $embed_code || $vid_url ) && !$force_feat_img ):
            
            	if( $vid_url ){
            		echo '<div class="vid-container">'.apply_filters('the_content', '[embed width="' . $embed_size . '"]' . $vid_url . '[/embed]').'</div>';
            	} else {
            		echo '<div class="vid-container">'.$embed_code.'</div>';
            	} 
            
            // Display gallery
            elseif( has_post_format( 'gallery' ) && !$force_feat_img ):
            
            	get_template_part( 'includes/loop-gallery' );
            
            // Display featured image
            elseif ( has_post_thumbnail() ): ?>
            
                <div class="img-container">    
                    <?php 
                    // Display the appropriate sized featured image
                    if( $my_size != 'col2' ): ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($my_size, array( 'class' => 'col1' ) ); ?></a>
                    <?php else: ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array( 'class' => 'col1' ) ); ?></a>
                    <?php endif; ?>
                    
                    <div class="actions">
    				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
	      			
					
                    <?php if ( get_post_meta($post->ID, 'Alt Title', true) ) { ?>
               
               <?php echo get_post_meta($post->ID, 'Alt Title', true) ?>
               
	                	<?php } else { the_title(); } ?>
                    
                    
                    
                    </a></h2>
                    <ul>
  <?php
  //wp_list_pages('title_li=&child_of='.$post->ID.'&depth=1'); ?>
  

  </ul>
					
					</div><!-- #actions --> 
                    
                    
                </div><!-- #img-container -->
                
                <?php if( has_post_format( 'gallery' ) ) get_template_part( 'includes/gallery-list' ); ?>
                
            <?php endif; // #has_post_thumbnail() ?>
            
            
            
              <div class="post-content">
            
	            <?php // Display post title ?>
	           <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
               
               
               <?php if ( get_post_meta($post->ID, 'Alt Title', true) ) { ?>
               
               <?php echo get_post_meta($post->ID, 'Alt Title', true) ?>
               
	                	<?php } else { the_title(); } ?>
	                </a></h2>
	           
                <?php // Display post content
	            
	            
	                //if( has_excerpt() ){ 
	                  //  the_excerpt(); 
	                //} else {
	                    //the_content(__('Continue Reading &rarr;', 'shaken'));
	              //  }
	                
	             ?>
	            
	             
            </div><!-- #entry -->
            
           
            
            
            
        </div><!-- #box-content -->
        
        
        
       
        
    </div><!-- #box -->
    <?php endwhile; ?>
</div><!-- #sort -->

<div class="page-desc">
    <?php echo $pContent; ?>
</div>


<?php endif; ?>








</div><!-- #grid -->
<?php get_footer('category'); ?>