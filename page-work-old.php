<?php
/* 
*Template Name: Work Old
*/

get_header(); ?>

<div id="grid">



<div class="wrap">

<div class="work-list">
<a href="work-list"><img src="<?php bloginfo(template_url); ?>/images/work-list.png" alt="Project List" title="Project List" /></a>
</div>
<div class="clearfix"></div>
</div>




<?php 
/**
 * Display ALL posts


/* Say hello to the Loop... */
$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC'
	));
	if ($wp_query->have_posts()) :

/* Anything placed in #sort is positioned by jQuery Masonry */ ?>
<div class="sort">
    
     
    
  
    
    <?php while ($wp_query->have_posts()) : $wp_query->the_post();
    	
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

        $postTitle = get_the_title();
        $dataRel = sanitize_title_with_dashes($postTitle);

        $size = 'large';
            //$galLink = get_the_post_thumbnail_url( 'large' );
        // $galLink = 'hlleo';
            //echo $galLink;

            // echo '<pre>';
            // print_r($thumb);
            // echo '</pre>';
    ?>
    
    <div class="all box col1<?php //echo $category_classes . $my_size; ?>">
        <?php //echo $galLink; ?>
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
            elseif ( has_post_thumbnail() ): 



                ?>
            
                <div class="img-container">    
                    <?php 
                    // Display the appropriate sized featured image
                    if( $my_size != 'col2' ): ?>
                       <!--  <a class="gal-work" href="<?php the_post_thumbnail_url( 'large' ); ?>" data-rel="<?php echo $dataRel; ?>" >
                            <?php the_post_thumbnail($my_size, array( 'class' => 'col1' ) ); ?>
                        </a> -->
                    <?php else: 

                    // Pull in title for first slide from the repeater field of the post
                        $ID = get_the_ID();
                        // specific post ID you want to pull
                        $post = get_post($ID); 
                        setup_postdata( $post );
                         
                            $i=0; if(have_rows('slides')) : while(have_rows('slides')) : the_row(); $i++;

                                $info = get_sub_field('info');
                                if( $i == 1 ) {
                                   
                                    $output = $info;
                                   
                                    break;
                                } else {
                                    $output = '';
                                }
                                //$output = 'afdsassad';
                            endwhile; endif;
                         
                        wp_reset_postdata();

                        ?>
                        <a title="<?php echo $output; ?>" class="gal-work" href="<?php the_post_thumbnail_url('large'); //the_permalink(); ?>" data-rel="<?php echo $dataRel; ?>" >
                            <img class="lazy col1" src="<?php the_post_thumbnail_url('post-thumbnail'); ?>" data-original="<?php the_post_thumbnail_url('post-thumbnail'); ?>" >
                            <?php //the_post_thumbnail('post-thumbnail', array( 'class' => 'col1' ) ); ?>
                        </a>
                    <?php endif; ?>
                    
                    <div class="actions">
        				<h2 class="hovertitle">
                            <a  class="" href="#">
                                <?php the_title(); ?>
                            </a>
            	      	</h2>
					</div><!-- #actions --> 
                    
                    
                </div><!-- #img-container -->
                
                <?php if( has_post_format( 'gallery' ) ) get_template_part( 'includes/gallery-list' ); ?>
                
            







            <?php endif; // #has_post_thumbnail() ?>
            
            
            
            
            
        </div><!-- #box-content -->
    </div><!-- #box -->
    <?php endwhile; ?>
</div><!-- #sort -->

<?php // Display pagination when applicable
if (  $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-below" class="navigation">
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'shaken') ); ?></div>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&rarr;</span>', 'shaken') ); ?></div>
        <div class="clearfix"></div>
    </div><!-- #nav-below -->
<?php endif; ?>

<?php else :
/* If there are no posts */ ?>
<div id="sort">
    <div class="box">
        <div class="box-content not-found">
        <h2><?php _e('Sorry, no posts were found', 'shaken'); ?></h2>
        <?php get_search_form(); ?>
        </div><!-- #not-found -->
    </div>
</div><!-- #sort -->
<?php endif; ?>








</div><!-- #grid -->


<?php 
wp_reset_query();
wp_reset_postdata(); 
$wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'post',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
    ));
    if ($wp_query->have_posts()) : ?>
    <div style="display: none">
    <?php 
    while ($wp_query->have_posts()) : $wp_query->the_post(); 
        $postTitle = get_the_title();
        $dataRel = sanitize_title_with_dashes($postTitle);
?>

    
<?php if(have_rows('slides')) : while(have_rows('slides')) : the_row(); 

        $info = get_sub_field('info');
        $slide = get_sub_field('slide');
        $url = $slide['url'];
        $title = $slide['title'];
        $alt = $slide['alt'];
        $caption = $slide['caption'];

        // thumbnail
        $size = 'loader';
         $sizeL = 'large';
        $thumb = $slide['sizes'][ $size ];
        $laregthumb = $slide['sizes'][ $sizeL ];
        $width = $slide['sizes'][ $size . '-width' ];
        $height = $slide['sizes'][ $size . '-height' ];

        echo '<pre>';
        print_r($slide);
        echo '</pre>';
?>
     <a class="gal-work" href="<?php echo $laregthumb; ?>" data-rel="<?php echo $dataRel; ?>" >
        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
    </a>
<?php endwhile; endif; ?>
<?php endwhile; ?>
</div>
<?php endif; ?>




<?php get_footer('category'); ?>