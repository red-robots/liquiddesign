<?php
/* 
*Template Name: Work
*/

get_header(); 

$tax = 'studio';
?>

<div id="grid">

<?php $this_page_id = $wp_query->post->ID; ?>

<?php 
$termArgs = array(
	'taxonomy' => 'studio',
    'hide_empty' => false
);
$terms = get_terms( $termArgs );

// echo '<pre>';
// print_r($terms);
// echo '</pre>';
/**
 * Display ALL posts
/* Let's query some posts first... */
query_posts(array(
'showposts' => 40, // how many pages to show
'post_parent' => $this_page_id, // parent page
'post_type' => 'page',  // this is a page not a post
'orderby' => 'menu_order')); /// order by this order.

/* Say hello to the Loop... */

/* Anything placed in #sort is positioned by jQuery Masonry */ ?>
<div class="wrap">
<div class="sortz flexwork">
    
    <?php foreach( $terms as $term ): 
    	$termId = $term->term_id;
    	$featImage = get_field( 'featured_image', $tax.'_'.$termId );
    	$termLink = get_term_link( $termId, 'studio');
  //   	echo '<pre>';
		// print_r($featImage);
		// echo '</pre>';
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
        
       
    ?>
    
    <div class="all box col1<?php //echo $category_classes . $my_size; ?>">
        
        <div <?php post_class( 'box-content '.$content_class ) ?>>
            
            
                <div class="img-container">    
                    <a href="<?php echo $termLink; ?>">
                    	<img src="<?php echo $featImage['url']; ?>">
                    </a>
                   
                    
                 <!--   <div class="actions">
	    				<h2>
				           	<a href="<?php echo $termLink; ?>">
				           		<?php echo $term->name; ?>
				           	</a>
			           	</h2>
                 	</div> #actions --> 
                    
                    
                </div><!-- #img-container -->
                
                
            
            
            
              <div class="post-content">
            
	            <?php // Display post title ?>
	           <!-- <h2>
		           	<a href="<?php the_permalink(); ?>">
		           		<?php echo $term->name; ?>
		           	</a>
	           	</h2> -->
	           
              </div><!-- #entry -->
          </div><!-- #box-content -->
        
        </div><!-- #box -->
    <?php endforeach; //endwhile; ?>
    
</div><!-- #sort -->
</div><!-- wrap -->

    <div class="page-desc center">
        <?php the_content(); ?>
    </div>

<?php //endif; ?>








</div><!-- #grid -->
<?php get_footer('category'); ?>