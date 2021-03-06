<?php
get_header(); ?>
    <div id="primary">
        <div id="content" role="main" class="page">

         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                <?php if(get_the_title()!='Shop'){?>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php }?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    
                    <?php edit_post_link( __( 'Edit', 'imminimal' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
            <?php endwhile; endif; ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>