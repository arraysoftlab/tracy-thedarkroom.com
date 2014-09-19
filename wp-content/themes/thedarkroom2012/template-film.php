<?php
/**
Template Name: Video Film Page
 */
 ?>
<?php
get_header(); ?>
    <div id="primary">
        <div id="content" role="main" class="page wide film-page">

         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
           <ul id="transferlist">
           <li class="transfer">Transfer</li>
           <li class="filmt"><a href="/film-to-dvd/">Transfer Film To DVD</a></li>
           <li class="videot"><a href="/video-tapes-to-dvd/">Transfer Video to DVD</a></li>
           </ul>             <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    <span class="clear"></span>
                    <?php edit_post_link( __( 'Edit', 'imminimal' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
            <?php endwhile; endif; ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>