<?php
/**
Template Name: Video Share
 */
 ?>
<?php
get_header(); ?>
<!--Additions-->


<style>
#footer1 {display: none}
</style>

<!--End Additions-->

    <div id="primary">
        <div id="content" role="main" class="page wide">
      
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <!--header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>-->



                <div class="entry-content">
<iframe src="//player.vimeo.com/video/<?php
$video = $_GET['video'];
print $video;
?>?title=0&amp;byline=0&amp;portrait=0" width="850" height="568" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

<?php the_content(); ?>

                    
                    
                    <?php edit_post_link( __( 'Edit', 'imminimal' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
            <?php endwhile; endif; ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>