<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php   // Hide Google fonts on HTTPS pages
global $post;     // if outside the loop
	if ( ! is_page('21') ) {?> 
		<link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
<?php }?>
<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo( 'template_directory' ); ?>/css/print.css" />

<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php bloginfo( 'template_directory' ); ?>/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-419167-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed" >
	<div id="header">         
 		<div id="homelink"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo( 'template_directory' ); ?>/images/transparent.gif" style="width: 420px; height: 80px;" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) );?>" /></a>
        </div><!--#homelink-->       
        
    	<!--div id="header-right">                  
            <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
            <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div--><!--#header-right-->

		<div id="top-nav" role="navigation">
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'imminimal' ); ?>"><?php _e( 'Skip to content', 'imminimal' ); ?></a></div>

				<?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>
		</div><!-- #top-nav -->
		<div id="sub-nav" role="navigation">
				<?php wp_nav_menu( array('menu' => 'Sub Menu' )); ?>
		</div><!-- #sub-nav -->
        <span class="clear"></span>
	<?php if (is_front_page() ) { ?>
   		<div id="random-image">
                
              
               
                <!--Add custom images/promotions here-->
        	<?php //echo do_shortcode("[random-image postid='1465']"); 
		  $args = array(
			  'post_type' => 'attachment',
			  'post_mime_type' => 'image',
			  'post_parent' => '1465'
		   );
		   $images = get_children( $args );
		   $count = count($images);	
		   $random_image = rand(1, $count)-1;	 
		  // echo "<!--random is ".$random_image."-->";
		   //echo "random is : $random_image";  
		   $new_array =  array_values($images);
		   //echo "<!--random2 is ";
		   //print_r($new_array);
		  // echo "-->";
		   
		   $image_id=$new_array[$random_image]->ID; 
		  // echo "<!--random3 is ".$image_id."-->";  
		   $image= wp_get_attachment_image( $image_id, "full");
		   echo $image;
			
			?> 
        </div><!--#random-image-->
	<?php }//if home ?>
		<div id="sub-nav2" role="navigation">
				<?php wp_nav_menu( array('menu' => 'Overlap Menu' )); ?>
		</div><!-- #sub-nav2 -->
	<?php if (is_front_page() || is_page('11') ) { ?>		        
        <div id="film-nav">
			<div id="whatdo"></div>
        	<?php wp_nav_menu( array('menu' => 'Film Menu' )); ?>      
        </div><!--#film-bar-->       
	<?php }//if home ?>
        <span class="clear"></span>
	</div><!-- #header -->
    
	<div id="main">