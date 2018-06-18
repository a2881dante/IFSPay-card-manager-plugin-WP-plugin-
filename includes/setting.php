<?php
/**
 * Created by PhpStorm.
 * User: a2881dante
 * Date: 24.04.2018
 * Time: 18:49
 */

    require_once("manager_control.php");

    function crmp_on_activate(){

        //$file = fopen(plugin_dir_path( __FILE__ )."log.txt", "a+");

        global $user_ID;

        $id1 = wp_insert_post(array(
            'post_type'         => 'page',
            'post_title'        => 'Card management',
            'post_content'      => '',
            'comment_status'    => 'closed',
            'post_status'       => 'publish',
            'ping_status'       => 'closed',
            'post_password'     => null,
            'post_author'       => $user_ID,
            'post_name'         => 'card-management',
            'post_password'     => time(),
        ));

        $id2 = wp_insert_post(array(
            'post_type'         => 'page',
            'post_title'        => 'Intercash card management',
            'post_content'      => '',
            'comment_status'    => 'closed',
            'post_status'       => 'publish',
            'ping_status'       => 'closed',
            'post_password'     => null,
            'post_author'       => $user_ID,
            'post_name'         => 'lilze-card-management',
            'post_password'     => time(),
        ));

        $zip = new ZipArchive();
        $res = $zip->open(plugin_dir_path( __FILE__ ).'balance_fin.zip');
        if ($res === TRUE) {
          $zip->extractTo(get_template_directory());
          $zip->close();
        } else {}

        update_option("crmp_core_link", get_page_link($id1));
        update_post_meta( $id2, '_wp_page_template', 'template-balance.php' );
    }

    function crmp_on_deactivate(){

        unlink(get_template_directory() . "/template-balance.php");
        delFolder(get_template_directory() . "/components");

        $posts = get_pages();
        foreach ($posts as $post){
            if(strpos($post->post_name, 'card-management') !== false 
                or strpos($post->post_name, 'lilze-card-management') !== false){
                $id = $post->ID;
                wp_delete_post($id, true);
            }
        }

    }

    function crmp_on_uninstall(){

        $posts = get_pages();
        foreach ($posts as $post){
            if(strpos($post->post_name, 'card-management') !== false){
                $id = $post->ID;
                wp_delete_post($id, true);
            }
        }

    }

    function delFolder($dir)
    {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delFolder("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

    function crmp_script_style_init(){

        global $wp_query;

        $post_obj = $wp_query->get_queried_object();
        $post_slug = $post_obj->post_name;

        if(strpos($post_slug, 'card-management') !== false or strpos($post_slug, 'lilze-card-management') !== false) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js", false, '1.12.2');
            wp_enqueue_script('jquery');
            wp_enqueue_script('bootstrap-js', plugins_url('crmp_card_register_manangment_plugin/assets/bootstrap/dist/js/bootstrap.min.js')
                , array('jquery'), '');
            wp_enqueue_script('bootstrap-js', plugins_url('crmp_card_register_manangment_plugin/assets/bootstrap/dist/js/bootstrap.min.js')
                , array('jquery'), '');
            wp_enqueue_script( 'custom-script-popper', plugins_url( 'crmp_card_register_manangment_plugin/assets/bootstrap/assets/js/vendor/popper.min.js')
                , array('jquery'), null, true);
            wp_enqueue_script('crmp_register_script', plugins_url('crmp_card_register_manangment_plugin/assets/js/register_script.js')
                , array('jquery'), null, true);
            wp_enqueue_script('crmp_custom-script-mask', plugins_url('crmp_card_register_manangment_plugin/assets/js/jquery.mask.min.js')
                , array('jquery'), null, true);
            wp_enqueue_style('cbtc-bootstrap-style', plugins_url('crmp_card_register_manangment_plugin/assets/bootstrap/dist/css/bootstrap.min.css'));
            wp_enqueue_style('cbtc-custom-style', plugins_url('crmp_card_register_manangment_plugin/assets/css/app.css'));
        }

    }

?>