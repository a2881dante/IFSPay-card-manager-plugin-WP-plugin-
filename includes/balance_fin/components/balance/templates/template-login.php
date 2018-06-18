<?php ?>
<div id="main-content">
    <article class="page type-page status-publish hentry">
        <div class="entry-content">
            <div class='container'>
                    
                    <div class=\"tab-pane fade show active\" id=\"personal\" role=\"tabpanel\" 
                        aria-labelledby=\"home-tab\">
                        <br>
                        <div class='row justify-content-center'>
                            <div class='col-12 col-sm-8'>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"></a>
                                <p class="title">Receive information about last transactions:</p>
                                <form id="balance-login" action="<?php echo get_permalink(get_page_by_title('balance'));?>" method="post">
            
                                    <div class='form-group row'>
                                        <label for='cardNumber' class='col-sm-4 col-form-label'>SAN/Card number</label>
                                        <div class='col-sm-8'>
                                            <input type='text' class='form-control' name='card-number' id='card-number' 
                                                placeholder='0000 0000 0000 0000'>
                                        </div>
                                    </div>
                
                                    <div class='form-group row'>
                                        <label for='amount' class='col-sm-4 col-form-label'>Secure Code </label>
                                        <div class='col-sm-8 input-group'>
                                            <input type='password' class='col-7 form-control js-pass-field' name='password' id='password' 
                                                placeholder='Secure Code'>
                                        </div>
                                    </div>
                                    <span class="toggle-pass js-toggle-pass"></span>
                                
                                    <input type='submit' class='col-sm-12' name='submit_person_register' value='Login'>
                                    <a href="<?php echo get_option("crmp_core_link"); ?>?page=register">I still do not have a card. register a new card</a>
                                    
                                </form>
                            </div>
                        </div>
                        
                    </div>
                        
                </div>
        </div>
        <!-- .entry-content -->
    </article>
    <!-- .et_pb_post -->
</div>
<?php
wp_register_script('balance_wld', get_template_directory_uri() . '/components/balance/js/balance.js',
    array('jquery','jquery_validate_js'),filemtime( COMPONENT_BALANCE_DIR . '/js/balance.js' ));
wp_enqueue_script('balance_wld');
?>
<?php get_footer(); ?>
<script src="<?php bloginfo('template_directory');?>/libs/paymentInfo/assets/scripts/libs/modernizr.js"></script>
<script src="<?php bloginfo('template_directory');?>/libs/paymentInfo/assets/scripts/libs/jquery.js"></script>
<script src="<?php bloginfo('template_directory');?>/libs/paymentInfo/assets/scripts/libs/jquery.inputmask.js"></script>
<script src="<?php bloginfo('template_directory');?>/libs/paymentInfo/assets/scripts/libs/jquery.inputmask.date.extensions.js"></script>
<script src="<?php bloginfo('template_directory');?>/libs/paymentInfo/assets/scripts/app.js"></script>
