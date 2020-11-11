<?php
/**
 * Header Template

 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 

        
        
<title><?php wp_title(''); ?></title>
<link href="https://plus.google.com/u/0/117978134845008410045/posts" rel="publisher"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=20120423234859" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox-1.3.4.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/colorbox.css" />
<link href="<?php echo get_template_directory_uri(); ?>/css/all.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<!-- lw1 -->
<?php 
/* Alternate Stylesheet selected in Theme Options */
if( of_get_option('alt_stylesheet') && of_get_option('alt_stylesheet') != "default" ): ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/skins/<?php echo of_get_option('alt_stylesheet'); ?>.css" media="screen" />
<?php endif; ?>

<?php // Custom styles set in Theme Options
//shaken_get_custom_styles(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css" />
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(".out").hide();
  //toggle the componenet with class msg_body
  jQuery(".pullout").click(function()
  {
    jQuery(this).next(".out").slideToggle(500);
  });
  
  
  
  

  
  
  
  
});</script>
<?php wp_head(); ?>

 
<?php 
// @font-face (Google Web Fonts) 
if( !of_get_option('disable_fontface') ): ?>
	
	<?php if( of_get_option('header_fontface') ):
		$header_ff_name = explode( ':', of_get_option('header_fontface') ); // grab font name
		
		$header_ff_clean = str_replace( '+', '-', $header_ff_name[0] ); // hyphenate
		
		$header_ff_name = str_replace( '+', ' ', $header_ff_name[0] ); // add spaces
		
		$header_ff_clean = strtolower( $header_ff_clean ); // lowercase
	else:
		// Defaults
		$header_ff_name = "Oswald";
		$header_ff_clean = 'oswald';
	endif; ?>
	
	<!-- <script type="text/javascript">
	    WebFontConfig = {
	    	google: { families: [ '<?php echo of_get_option( 'header_fontface' ); ?>' ] }
	    };
	    (function() {
	    var wf = document.createElement('script');
	    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	    wf.type = 'text/javascript';
	    wf.async = 'true';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(wf, s);
	    })();
    </script> -->
    <script type="text/javascript">
	    WebFontConfig = {
	    	google: { families: [ 'Oswald:latin' ] }
	    };
	    (function() {
	    var wf = document.createElement('script');
	    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	    wf.type = 'text/javascript';
	    wf.async = 'true';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(wf, s);
	    })();
    </script>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo $header_ff_clean; ?>.css" />
    
    <?php if( of_get_option( 'logo_fontface' ) && of_get_option( 'logo_fontface' ) != of_get_option( 'header_fontface' ) ) :
    
		$logo_ff_clean = of_get_option( 'logo_fontface' ); // grab entire font string
		$logo_ff_name = explode( ':', $logo_ff_clean ); // grab font name
		$logo_ff_name = str_replace( '+', ' ', $logo_ff_name[0] ); // add spaces
		$load_single = true;
		
	elseif( of_get_option( 'logo_fontface' ) && of_get_option( 'header_fontface' ) == of_get_option( 'logo_fontface' ) ):
	
		$logo_ff_name = $header_ff_name;
		$logo_ff_clean = of_get_option( 'header_fontface' );
		$load_single = false;
		
	else:
		
		// Defaults
		$logo_ff_name = 'Oswald';
		$logo_ff_clean = 'Oswald';
		$load_single = true;
				
	endif; ?>
	
	<?php if( $load_single ): ?>
    	<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=<?php echo $logo_ff_clean; ?>&text=<?php echo urlencode( esc_attr( get_bloginfo( 'name', 'display' ) ) ); ?>"> -->
    <?php endif; ?>
    
   
	
<?php endif; ?>

</head>

<body>
<div class="image-shower"></div>
<div id="header">

<?php //if( ! is_single()) { ?>
	<div class="wrap">
    <?php //} ?>
    
    
    	<div id="site-info" class="js-blocks" itemscope itemtype="http://schema.org/Organization">
        
    
                <a itemprop="url" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
               	 <img itemprop="logo" src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>" title="<?php bloginfo( 'name' ); ?>" id="logo" />
                </a>
    
            
            
        </div><!-- #site-info -->

        <div class="tagline js-blocks">
        	<p>
        	<?php 
	        	$tagline = get_field('site_tagline', 'option');
	        	echo $tagline 
        	?>
        	</p>
        </div>
        
        
        <?php /* Main Menu */ ?>
        <div class="headernavfloatright">
        <div class="header-nav">
        	<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => '' ) ); ?>
        </div>
        </div>
        
       
        
        <div class="clearfix"></div>
        
        
        <?php //if( ! is_single()) { ?>
	</div><!-- #wrap -->
    <?php //} ?>
    
</div>