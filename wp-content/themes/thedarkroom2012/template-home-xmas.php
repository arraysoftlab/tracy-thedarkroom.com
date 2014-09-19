<?php
/**
Template Name: HomePage XMas
 */
 ?>
<?php get_header(); ?>
<div id="primary">
	<div id="content" role="main">           

		
  
		
    	
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

    
    
          
	     
      
   	 
 			<?php echo apply_filters('the_content',$hp_content); ?>  
  
		<span class="clear"></span>
   </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>

