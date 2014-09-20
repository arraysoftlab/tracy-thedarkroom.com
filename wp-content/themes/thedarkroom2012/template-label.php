<?php
/**
 * Template Name: USPS Mailing Label
 */
?>
<?php get_header() ?>
<div id="primary">
    <div id="content" role="main" class="page wide label">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <!--h1 class="entry-title"><?php the_title(); ?></h1-->
                </header>
                <!-- .entry-header -->
                <div class="entry-content">
                    <?php the_content(); ?>
                    <!--Edit Template-label.php file -->
                    <?php edit_post_link(__('Edit', 'imminimal'), '<span class="edit-link">', '</span>'); ?>
                        <?php
                        if(!isset($_POST['submit']) || isset($_GET['error'])) {
                        ?>
                        <div class="lable-left">
                        <?php
                            if(isset($_GET['error'])) {
                                ?>
                                <span style="color:#ff0000"><h3>Something wrong. Please check again and submit.</h3>
                                <?php
                            }
                            ?>
                            <form method="POST" action="">
                                <fieldset id="labelfields">
                                    <span class="gfield_required" style="float:right">* Required Fields</span>
                                    <label for="full_name">Name<span class="gfield_required">*</span></label>
                                    <input name="full_name" class="lname" type="text" placeholder="Name" value="<?php echo $_GET['full_name'] ?>"/>
                                    <label for="address1">Address<span class="gfield_required">*</span></label>
                                    <input name="address1" class="laddress1" type="text" placeholder="Address 1" value="<?php echo $_GET['address1'] ?>"/>
                                    <input name="address2" class="laddress2" type="text" placeholder="Address 2" value="<?php echo $_GET['address2'] ?>"/>
                                    <div class="lcity"><label for="CustomerCity">City<span class="gfield_required">*</span></label>
                                        <input name="city" type="text" class="lcity" placeholder="City" value="<?php echo $_GET['city'] ?>"/>
                                    </div>
                                    <div class="lstate"><label for="CustomerState">State<span class="gfield_required">*</span></label>
                                        <input name="state" class="lstate" type="text" placeholder="State" value="<?php echo $_GET['state'] ?>"/>
                                    </div>
                                    <div class="lzip">
                                        <label for="zip">Zip code<span class="gfield_required">*</span></label>
                                        <input name="zip" type="text" class="lzip" placeholder="Zip Code" size="7" value="<?php echo $_GET['zip'] ?>"/>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <input type="submit" name="submit" value="Create Label" class="lable-submit"/>
                                </fieldset>
                            </form>
                        </div>
                        <!--Righ Column-->
                        <div class="lable-right">
                            <img src="http://thedarkroom.com/wp-content/uploads/2014/06/mailing-lable-and-envelope.jpg" alt="mailing-lable-and-envelope" width="414" height="267"
                                 class="alignnone size-full wp-image-3716"/>
                        </div>
                        <?php
                        } else {
                            $name = strip_tags($_POST['full_name']);
                            $address1 = strip_tags($_POST['address1']);
                            $address2 = strip_tags($_POST['address2']);
                            $city = strip_tags($_POST['city']);
                            $state = strip_tags($_POST['state']);
                            $zipCode = strip_tags(str_replace(' ', '', $_POST['zip']));
                            ?>
                            <div>
                                <div class="">
                                    <form method="POST" action="<?php echo get_template_directory_uri(); ?>/get-order-form-n-label.php" target="_blank">
                                        <input type="hidden" name="full_name" value="<?php echo $name ?>"/>
                                        <input type="hidden" name="address1" value="<?php echo $address1 ?>"/>
                                        <input type="hidden" name="address2" value="<?php echo $address2 ?>"/>
                                        <input type="hidden" name="city" value="<?php echo $city ?>"/>
                                        <input type="hidden" name="state" value="<?php echo $state ?>">
                                        <input type="hidden" name="zip" value="<?php echo $zipCode ?>">
                                        <input type="hidden" name="redirect_to" value="<?php echo get_permalink() ?>"/>
                                        <input type="submit" name="order_form" value="Download Order Form"/>
                                    </form>
                                </div>
                                <div class="">
                                    <form method="POST" action="<?php echo get_template_directory_uri(); ?>/get-order-form-n-label.php" target="_blank">
                                        <input type="hidden" name="full_name" value="<?php echo $name ?>"/>
                                        <input type="hidden" name="address1" value="<?php echo $address1 ?>"/>
                                        <input type="hidden" name="address2" value="<?php echo $address2 ?>"/>
                                        <input type="hidden" name="city" value="<?php echo $city ?>"/>
                                        <input type="hidden" name="state" value="<?php echo $state ?>">
                                        <input type="hidden" name="zip" value="<?php echo $zipCode ?>">
                                        <input type="hidden" name="redirect_to" value="<?php echo get_permalink() ?>"/>
                                        <input type="submit" name="shipping_label" value="Download Shipping Label"/>
                                    </form>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    <hr>
                    <h2><span class="step">3</span> Prepare and mail your order<span class="stepdesc">Follow instructions on mailing label and order form</span></h2>
                    <ol>
                        <li>Attach mailing label to a 6"x9" padded envelope. Follow USPS instructions on mailing label.</li>
                        <li>If you prepaid online, include a copy of the receipt or write down your order number and include it with your film.</li>
                        <li>If you are using the order form, insert order form, payment & film</li>
                    </ol>
                </div>
                <!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; endif; ?>
    </div>
    <!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>