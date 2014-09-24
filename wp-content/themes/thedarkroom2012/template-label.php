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
                
					<!--table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tbody>
						<tr>
						<td>
						<h2><span class="step">1</span> Download and print order form<span class="stepdesc">If you paid online or already have a form, this step is optional.</span></h2>
						<a class="buybutton" href="/Film-Developing-Form.pdf">Download PDF Order Form</a></td>
						<td><a title="Film Developing Form" href="http://thedarkroom.com/Film-Developing-Form.pdf" target="_blank"><img class="alignnone size-full wp-image-169" title="order-form" src="http://thedarkroom.com/wp-content/uploads/2011/01/film-developing-download-form.jpg" alt="" width="229" height="155" /></a></td>
						</tr>
						</tbody>
					</table>
					
					<hr /-->
					
					<div style="text-align:center;font-size: 15px;color: #7d7d7d;margin-bottom:50px">
					<h1>Order Form and Mailing Label</h1>
					<img src="/wp-content/uploads/2014/06/printer-icon1.gif" style="vertical-align:middle"> You will need a printer for order form and mailing label
					</div>
					
					
					<table style="width:100%">
							<tr>
								<td valign="top" style="padding-right:30px">
					
					<h2><span class="step">1</span> Personalized/Trackable Forms<span class="stepdesc">Complete form to create a custom order form and mailing label</span></h2>
					<div style="margin:10px 0">
					<strong>Outside of the United States?</strong> <a href="/Shipping-Label.pdf" target="_blank">Download and print international shipping label.</a> 
					</div>


                   
                    <!--Edit Template-label.php file -->
             
                        <?php
                        if(!isset($_POST['submit']) || isset($_GET['err'])) {
                        ?>
                        <div>
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
                                    <input name="phone" class="phone" type="text" placeholder="555 555-5555" value="<?php echo $_GET['phone'] ?>"/>
                                    <div style="clear:both;"></div>
                                    <div class="button-wrap">
                                        <a id="create-label-n-order-form" class="button" href="#download-modal-panel">Create Label & Order Form</a>
                                    </div>
                                </form>
                            </div>

                            <div id="download-modal-panel" class="lightbox">
                                <div class="button-wrap">
                                    <a class="button" href="" target="_blank" data-action="order-form">Print Order Form</a>
                                    <a class="download" href="" target="_blank" data-action="order-form">Download Order Form</a>
                                </div>
                                <div class="button-wrap">
                                    <a class="button" href="" target="_blank" data-action="shipping-label">Print Mailing Shipping Label</a>
                                    <a class="download" href="" target="_blank" data-action="shipping-label">Download Mailing Shipping Label</a>
                                </div>
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
                                .button-wrap a.download {
                                    font-size: 14px;
                                    text-decoration: underline !important;
                                    color: #26a2fc !important;
                                }
                                .button-wrap a:hover {
                                    text-decoration: none;
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
                        <?php
                        }
                        ?>
                   </td>
                   <td width="400px" valign="top">
                    <h2><span class="step">2</span> Prepare and mail your order<span class="stepdesc">Follow instructions on mailing label and order form</span></h2>
                    <ol>
                        <li>Attach mailing label to a 6"x9" padded envelope. Follow USPS instructions on mailing label.</li>
                        <li>If you prepaid online, include a copy of the receipt or write down your order number and include it with your film.</li>
                        <li>If you are using the order form, insert order form, payment & film</li>
                    </ol>
                    
                    <img src="/wp-content/uploads/2014/06/form-label-image.jpg" width="100%">
                   </td>
							</tr>
								</table>
                    <hr>
                    
                     <?php the_content(); ?>
                            <?php edit_post_link(__('Edit', 'imminimal'), '<span class="edit-link">', '</span>'); ?>
                </div>
                <!-- .entry-content -->
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; endif; ?>
    </div>
    <!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>