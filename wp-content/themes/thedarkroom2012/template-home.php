<?php
/**
Template Name: HomePage
 */
 ?>
<?php get_header(); ?>
<div id="primary">
	<div id="content" role="main">           
        <!--div id="hp-carousel">
        <?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
        </div>
		
        <div class="dotted-line"></div>-->
		
    	<div id="hp-left"> 
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php $postid=get_the_ID(); ?>
        <?php $hp_content=get_the_content(); ?>
        
            <!--div id="hp-offer">
                <a href="<?php echo get_post_meta($postid, 'wpcf-offer-url', true); ?>">
                <?php if ( has_post_thumbnail() ) { 			
				 	the_post_thumbnail('full'); 
				}?>
                </a>
            </div--><!--hp-offer-->
            
            <?php endwhile; // end of the loop. ?>  

    
    
           <div id="hp-blog">
        <?php 
        $args = array(
        'numberposts'     => 3,
        'order' 		  => 'DESC'
     ); 
    
    $blog_posts = get_posts( $args );	
    foreach( $blog_posts as $post ) :	setup_postdata($post); 
        $postid= get_the_ID();
    
    ?>
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<a class="home-thumb" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e( 'Permanent Link to') ?> <?php the_title_attribute(); ?>"><?php the_post_thumbnail(array(280,280)); ?></a>
                <a class="date-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e( 'Permanent Link to') ?> <?php the_title_attribute(); ?>"><?php the_time('F j, Y') ?></a>
                 <?php the_excerpt(); ?>
 
            
    <?php endforeach; ?>        
            </div><!--#hp-blog -->
			<a href="<?php echo home_url( '/' ); ?>category/photo-tips/" class="hp-blog-button grey-button">The Darkroom News and Updates</a> 
         </div><!--#hp-left -->        
      
      <div id="hp-right">       	 
 			<?php echo apply_filters('the_content',$hp_content); ?>  
      </div><!--#hp-right -->  
		<span class="clear"></span>
   </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>

