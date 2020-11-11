<?php

get_header(); 
$termOb = get_queried_object();
$featBanner = get_field('featured_banner',$termOb);
// echo '<pre>';
// print_r($termOb);
// echo '</pre>';
if( $featBanner ):
?>
<div class="wrap">
    <div class="featured-banner">
        <div class="blackcover"></div>
      <div class="orange-one">
        <div class="cop">
          <h1><?php echo $termOb->name; ?></h1>
          <h2><?php echo $termOb->taxonomy; ?></h2>
          <div class="desc"><?php echo term_description(); ?></div>
        </div>
        
      </div>
      <!-- <div class="orange-two"></div> -->
      <!-- <img src="<?php echo $featBanner['url']; ?>"> -->
      
      <!-- <div class="the-image" style="background-image: url(<?php echo $featBanner['url']; ?>);"> -->
        <div class="the-image">
            <img src="<?php echo $featBanner['url']; ?>">
        </div>
        <div class="titlebar">
            Selected Projects
        </div>
        <div class="mobile">
            <?php echo term_description(); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<div id="grid">



<div class="wrap">


<div class="clearfix"></div>
</div>


<div class="wrap">
    <?php /* Anything placed in #sort is positioned by jQuery Masonry */ ?>
    <!-- <div class="sort"> -->
        <div class="flexer">
    <?php 
    if ( have_posts() ) : while(have_posts()) : the_post();  
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
                                endwhile; endif;
                             
                            wp_reset_postdata();

                            ?>
                            <a title="<?php echo $output; ?>" class="" href="<?php the_permalink();//the_post_thumbnail_url('large'); // ?>" data-rel="<?php echo $dataRel; ?>" >
                                <img class="lazy col1" src="<?php the_post_thumbnail_url('post-thumbnail'); ?>" data-original="<?php the_post_thumbnail_url('post-thumbnail'); ?>" >
                            </a>
                        
                        
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
</div><!-- wrap -->
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
<?php get_footer('category'); ?>