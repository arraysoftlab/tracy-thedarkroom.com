<?php
/*
Template Name: label Template
*/

?>
<?php get_header() ?>

    <div id="primary">
          <div id="content" role="main" class="page wide label">
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <!--h1 class="entry-title"><?php the_title(); ?></h1-->
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                    
                    
                    
                    <!--Edit Template-label.php file -->
                    <?php edit_post_link( __( 'Edit', 'imminimal' ), '<span class="edit-link">', '</span>' ); ?>
<div class="lable-left">
                    <?php 
                        if(!isset($_GET['labelerror'])){
                    ?>
                    <form method="POST" action="<?php echo get_template_directory_uri(); ?>/get_labels.php" target="_blank" >
                        <fieldset id="labelfields">
                        <span class="gfield_required" style="float:right">* Required Fields</span>
                            <label for="name">Name<span class="gfield_required">*</span></label>
                            <input name="name" class="lname" type="text" placeholder="Name"/> 
                            <label for="address1">Address<span class="gfield_required">*</span></label>
                            <input name="address1" class="laddress1" type="text" placeholder="Address 1"/>
                            <input name="address2" class="laddress2" type="text" placeholder="Address 2"/>
                            <div class="lcity"><label for="CustomerCity" >City<span class="gfield_required">*</span></label>
                          
                            <input name="CustomerCity" type="text" class="lcity" placeholder="City"/>
                              </div>
                             <div class="lstate"><label for="CustomerState" >State<span class="gfield_required">*</span></label>
                            <input name="CustomerState" class="lstate" type="text"  placeholder="State"/>
                             </div>
                              <div class="lzip">
                            <label for="zipcode" >Zip code<span class="gfield_required">*</span></label>
                            <input name="zipcode" type="text"  class="lzip" placeholder="Zip Code" size="7"/>
                              </div>
<div style="clear:both;"></div>
                            <input type="submit" value="Create Label" class="lable-submit"/>
                        </fieldset>
                    </form>
                    <?  }else{ ?>
                        <span style="color:#ff0000"><h3>Please complete all the fields in form.</h3>
                        <?php echo $_GET['labelerror']; ?></span>
                        <form method="POST" action="<?php echo get_template_directory_uri(); ?>/get_labels.php" >
                            <fieldset id="labelfields">
                            <label for="name">Name<span class="gfield_required">*</span></label>
                            <input name="name" class="lname" type="text" placeholder="Name"/> 
                            <label for="address1">Address<span class="gfield_required">*</span></label>
                            <input name="address1" class="laddress1" type="text" placeholder="Address 1"/>
                            <input name="address2" class="laddress2" type="text" placeholder="Address 2"/>
                            <div class="lcity"><label for="CustomerCity" >City<span class="gfield_required">*</span></label>
                          
                            <input name="CustomerCity" type="text" class="lcity" placeholder="City"/>
                              </div>
                             <div class="lstate"><label for="CustomerState" >State<span class="gfield_required">*</span></label>
                            <input name="CustomerState" class="lstate" type="text"  placeholder="State"/>
                             </div>
                              <div class="lzip">
                            <label for="zipcode" >Zip code<span class="gfield_required">*</span></label>
                            <input name="zipcode" type="text"  class="lzip" placeholder="Zip Code" size="7"/>
                              </div>
<div style="clear:both;"></div>
                            <input type="submit" value="Create Label"  class="label-submit"/>
                        </fieldset>
                        </form>
                    <?php } ?>
</div>
               
               
<!--Righ Column-->

               
                <div class="lable-right">
              <img src="http://thedarkroom.com/wp-content/uploads/2014/06/mailing-lable-and-envelope.jpg" alt="mailing-lable-and-envelope" width="414" height="267" class="alignnone size-full wp-image-3716" />   
                </div>
                <hr>
                <h2><span class="step">3</span> Prepare and mail your order<span class="stepdesc">Follow instructions on mailing label and order form</span></h2>
                <ol>
                <li>
                Attach mailing label to a 6"x9" padded envelope. Follow USPS instructions on mailing label.
                </li>
                 <li>
                If you prepaid online, include a copy of the receipt or write down your order number and include it with your film.
                </li>
                 <li>
                If you are using the order form, insert order form, payment & film
                </li>
                </ol>
                
                
                </div><!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
            
            <?php endwhile; endif; ?>               
      </div><!-- #content -->
    </div><!-- #primary -->



<?php get_footer(); ?>
