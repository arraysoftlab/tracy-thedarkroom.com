<?php
/**
 * @package WordPress
 * @subpackage imminimal
 */

get_header(); ?>

<div id="primary">
    <div id="content" role="main" class="page">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">

        	<h1 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
             <?php get_template_part('/partials/social-links'); ?>        
             <p class="date"><?php the_time('F j, Y'); ?> 
                  <span class="comments"><?php comments_popup_link( __( 'No Comments &#187;' ), __( '1 Comment &#187;'), __( '% Comments &#187;' ) ); ?></span>
             </p>

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
<?php edit_post_link( __( 'Edit', 'imminimal' ), '<span class="edit-link">', '</span>' ); ?>

       </div><!--.post--> 

				<?php comments_template( '', true ); ?>

			<?php endwhile; else: ?>

                <p><?php _e( 'Sorry, no posts matched your criteria.' ) ?></p>

            <?php endif; ?>


			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
