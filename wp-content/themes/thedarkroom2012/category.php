<?php get_header(); ?>
    <div id="primary">
        <div id="content" role="main" class="page">
			<h1 class="entry-title"><?php single_cat_title( '', false );?></h1>
   <?php if ( have_posts() ) : ?>
                <?php while (have_posts()) : the_post(); ?>
                   <div class="post" id="post-<?php the_ID(); ?>">
                          <div class="post-content">                      
                            <h3 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                            <p class="date"><?php the_time('F j, Y'); ?><span class="comments"><?php comments_popup_link( __( 'No Comments &#187;' ), __( '1 Comment &#187;' ), __( '% Comments &#187;' ) ); ?></span></p>

                           <div class="entry">
								<div class="tips-thumb"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'imminimal' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail(array(325,325)); ?></a></div>
                             	<?php the_excerpt(); ?>
								<span class="clear"></span>
                            </div><!--.entry-->                           
                        </div><!--.post-content--> 
                    </div><!--.post--> 
                  <?php endwhile; ?>

                <div class="navigation">

                    <div class="alignleft"><?php next_posts_link( __( '&larr; Previous Entries' ) ) ?></div>
                    <div class="alignright"><?php previous_posts_link( __( 'Next Entries &rarr;' ) ) ?></div>

                </div><!--.navigation--> 

            <?php else : ?>

                <h3 class="center"><?php _e( 'Not Found') ?></h3>
               	<p>Sorry, no posts were found.</p>

            <?php endif; ?>			
	
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>