<?php
/*
Template Name: Processing Template
*/

?>
<?php get_header() ?>
    <div id="primary">
        <div id="content" role="main" class="page wide">

         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    
                    <?php edit_post_link( __( 'Edit', 'imminimal' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
            
            <?php endwhile; endif; ?>
            
 		<div class="film-left">
            <h2>Pay Online</h2>
            35mm, 110, 120, C-41 Color Negative, E-6 Slide
            and True Black &amp; White
            <img title="Film Developing for $10 a roll" src="<?php echo home_url( '/' ); ?>wp-content/uploads/2011/01/film-developing-10.jpg" alt="35mm and 120 Film Developing" width="280" height="113" />
            <?php gravity_form(2, false, false); ?>
        </div><!--.film-left-->
        
        <div class="film-right">
            <h2>Pay by Mail</h2>
            <p>Download PDF and print prepaid mailer and order form</p>
            <a href="<?php echo home_url( '/' ); ?>form/" target="_blank" title="Film Developing Form"><img class="alignnone size-full wp-image-169" title="order-form" src="<?php echo home_url( '/' ); ?>wp-content/uploads/2011/01/film-developing-download-form.jpg" alt="" width="229" height="155" /></a>
            <a href="<?php echo home_url( '/' ); ?>form/" onClick="javascript: _gaq.push(['_trackPageview', '/download/develop-order-form']);" target="_blank" title="Film Developing Form"><img style="clear: left;" title="button-prin.ptmailer" src="<?php echo home_url( '/' ); ?>wp-content/uploads/2011/01/button-printmailer.jpg" alt="" width="141" height="31" /></a>
            <p class="or">OR…</p>
						
            <p>We'll send you a postage paid mailer and order form.</p>
            <a href="<?php echo home_url( '/' ); ?>film-developing/request-postage-paid-mailer/"><img class="size-full wp-image-174 alignnone" title="mailer-sm" src="<?php echo home_url( '/' ); ?>wp-content/uploads/2011/01/mailer-sm.jpg" alt="" width="227" height="120" /><img class="alignnone size-full wp-image-130" title="button-requestmailer" src="<?php echo home_url( '/' ); ?>wp-content/uploads/2011/01/button-requestmailer.jpg" alt="" width="137" height="29" /></a>        
        </div><!--.film-right-->
        
		<div class="featured_products">
            <h3>Need more information? Learn more about our</h3>
            <p><a href="<?php echo home_url( '/' ); ?>information-on-scanning-your-negatives/">Scanning information and resolution</a> | <a href="<?php echo home_url( '/' ); ?>black-and-white-prints-and-film-developing/">True black and white prints</a>  | <a href="<?php echo home_url( '/' ); ?>120-film-developing/">120 film developing</a><br />
            <a href="<?php echo home_url( '/' ); ?>cross-processing-film/">Learn about  cross processing</a> | <a href="<?php echo home_url( '/' ); ?>what-is-lomography/">What is Lomography</a> | <a href="<?php echo home_url( '/' ); ?>choosing-35mm-film-or-120-film/">120 or 35mm? We help decide.</a></p>
         </div><!--.featured_products-->
		
        <div id="problems">
		      <h3>Problems?</h3>
				<p>We want to know. <a href="<?php echo home_url( '/' ); ?>contact/">Click here to report a problem or share your experience</a></p>
		</div><!--#problems-->
				
		<div class="disclaimer">
        <p>* Sprocket hole option only available from Holga or Diana with 35mm back, Sprocket Rocket or Spinner camera.
*Limit of Liability - Submitting any tangible or electronic media, image, data, file, card, disc, device, film, print, slide or negative for any purpose, such as processing, printing, duplication, alteration, enlargement, storage, transmission, or other handling, constitutes an AGREEMENT that any loss or damage to it by our company, subsidiary or agents, even though by our negligence or other fault, will only entitle you to replacement with an equivalent quantity/size of unexposed photographic film or electronic media.  Except for such replacement, our acceptance of the media, image, data, file, card, disc, device, film, print, slide or negative is without other liability, and recovery for any incidental or consequential damages is excluded.  No expressed or implied warranty is provided</p>   
		</div><!--.disclaimer-->                   
      </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>
