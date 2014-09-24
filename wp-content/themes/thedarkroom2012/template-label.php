<?php
/**
 * Template Name: USPS Mailing Label
 */
?>
<?php get_header() ?>
    <style type="text/css">
        @media all{.featherlight{display:none;position:fixed;top:0;right:0;bottom:0;left:0;z-index:2;text-align:center;white-space:nowrap;cursor:pointer;background:#333;background:rgba(0,0,0,0)}.featherlight:last-of-type{background:rgba(0,0,0,.8)}.featherlight:before{content:'';display:inline-block;height:100%;vertical-align:middle;margin-right:-.25em}.featherlight .featherlight-content{position:relative;text-align:left;vertical-align:middle;display:inline-block;overflow:auto;padding:25px 25px 0;border-bottom:25px solid transparent;min-width:30%;margin-left:5%;margin-right:5%;max-height:95%;background:#fff;cursor:auto;white-space:normal}.featherlight .featherlight-inner{display:block}.featherlight .featherlight-close-icon{position:absolute;z-index:9999;top:0;right:0;line-height:25px;width:25px;cursor:pointer;text-align:center;font:Arial,sans-serif;background:#fff;background:rgba(255,255,255,.3);color:#000}.featherlight .featherlight-image{width:100%}.featherlight-iframe .featherlight-content{border-bottom:0;padding:0}.featherlight iframe{border:0}}@media only screen and (max-width:1024px){.featherlight .featherlight-content{margin-left:10px;margin-right:10px;max-height:98%;padding:10px 10px 0;border-bottom:10px solid transparent}}
    </style>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/featherlight.min.js"></script>
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
                        if(!isset($_POST['submit']) || isset($_GET['err'])) {
                        ?>
                        <div class="lable-left">
                        <?php
                            if(!empty($_GET['err'])) {
                                ?>
                                <div style="color:#ff0000">
                                    <h3>Something wrong. Please check again and submit.</h3>
                                    <ul>
                                    <?php
                                    foreach($_GET['err'] as $err) {
                                        echo "<li>$err</li>";
                                    }
                                    ?>
                                    </ul>
                                </div>
                                <?php
                            }
                            ?>
                            <div id="offline-order-form">
                                <form method="POST" action="">
                                    <input type="hidden" name="redirect_to" value="<?php echo get_permalink() ?>"/>
                                    <span class="gfield_required" style="float:right">* Required Fields</span>
                                    <label for="full_name">Name<span class="gfield_required">*</span></label>
                                    <input name="full_name" class="required" type="text" placeholder="Name" value="<?php echo $_GET['full_name'] ?>"/>
                                    <label for="address1">Address<span class="gfield_required">*</span></label>
                                    <input name="address1" class="required" type="text" placeholder="Address 1" value="<?php echo $_GET['address1'] ?>"/>
                                    <input name="address2" class="" type="text" placeholder="Address 2" value="<?php echo $_GET['address2'] ?>"/>
                                    <div class="lcity"><label for="CustomerCity">City<span class="gfield_required">*</span></label>
                                        <input name="city" type="text" class="required" placeholder="City" value="<?php echo $_GET['city'] ?>"/>
                                    </div>
                                    <div class="lstate"><label for="CustomerState">State<span class="gfield_required">*</span></label>
                                        <input name="state" class="required" type="text" placeholder="State" value="<?php echo $_GET['state'] ?>"/>
                                    </div>
                                    <div class="lzip">
                                        <label for="zip">Zip code<span class="gfield_required">*</span></label>
                                        <input name="zip" type="text" class="required" placeholder="Zip Code" size="7" value="<?php echo $_GET['zip'] ?>"/>
                                    </div>
                                    <label for="email">Email</label>
                                    <input name="email" class="email" type="text" placeholder="me@myworld.com" value="<?php echo $_GET['email'] ?>"/>
                                    <label for="phone">Phone</label>
                                    <input name="phone" class="phone" type="text" placeholder="+001 123 4566" value="<?php echo $_GET['phone'] ?>"/>
                                    <div style="clear:both;"></div>
                                    <div class="button-wrap">
                                        <a id="create-label-n-order-form" class="button" href="#download-modal-panel">Create Label & Order Form</a>
                                    </div>
                                </form>
                            </div>

                            <div id="download-modal-panel" class="lightbox">
                                <div class="button-wrap"><a class="button" href="" target="_blank" data-action="order-form">Download Order Form</a></div>
                                <div class="button-wrap"><a class="button" href="" target="_blank" data-action="shipping-label">Download Shipping Label</a></div>
                            </div>
                            <style type="text/css">
                                .lightbox {
                                    display: none;
                                }
                                .button-wrap {
                                    margin: 10px auto;
                                    text-align: center;
                                }
                                .button-wrap a.button {
                                    display: block;
                                    font-size: 25px;
                                    background-color: #26a2fc;
                                    text-decoration: none !important;
                                    color: white !important;
                                    padding: 15px 30px;
                                }
                                .button-wrap a.button:hover {
                                    text-transform: none;
                                }
                                .error-msg {
                                    color: red;
                                }
                                .featherlight .featherlight-content {
                                    width: 50%;
                                    height: 50%;
                                }
                            </style>
                            <script type="text/javascript">
                                jQuery(function($) {
                                    var url = "<?php echo get_template_directory_uri(); ?>/get-order-form-n-label.php";
                                    $('#create-label-n-order-form').click(function() {
                                        var valid = true;
                                        var form = $('#offline-order-form form');
                                        form.find('.error-msg').remove();
                                        form.find('.required').each(function() {
                                            if(!$(this).val()) {
                                                $(this).after('<span class="error-msg">*This field is required</span>');
                                                valid = false;
                                            }
                                        });
                                        if(valid) {
                                            $.featherlight($('#download-modal-panel'), {
                                                targetAttr: 'href',
                                                afterOpen: function() {
                                                    $('.featherlight-content').find('#download-modal-panel a').each(function() {
                                                        $(this).attr('href', url + '?action=' + $(this).data('action') + '&' + $('#offline-order-form form').serialize());
                                                    })
                                                }
                                            });
                                        }
                                    });
                                })
                            </script>
                        </div>
                        <!--Righ Column-->
                        <div class="lable-right">
                            <img src="http://thedarkroom.com/wp-content/uploads/2014/06/mailing-lable-and-envelope.jpg" alt="mailing-lable-and-envelope" width="414" height="267"
                                 class="alignnone size-full wp-image-3716"/>
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