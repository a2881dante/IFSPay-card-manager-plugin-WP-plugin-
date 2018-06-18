<?php

    require_once("manager_view.php");

    function crmp_action_add_page($content){

        global $wp_query;
        global $wpdb;

        $post_obj = $wp_query->get_queried_object();
        $post_slug = $post_obj->post_name;

        if(isset($_POST['submit_person_register'])){
            action_register_person();
        }else if(isset($_POST['submit_organization_register'])){
            action_register_organization();
        }

        if(strpos($post_slug, 'card-management') !== false) {
            if(isset($_GET['page'])){
                if ($_GET['page'] == 'register'){
                    generation_register_page();
                }elseif ($_GET[''] == 'manager'){
                    generation_manager_view();
                }
            }else{
                //generation_login_view();
                generation_register_page();
            }
        }

    }


    function generation_register_page(){

        echo getAltRegisterView();

    }

    function action_register_person(){
        if(isset($_POST['pFirstName']) 
                and isset($_POST['pLastName'])
                and isset($_POST['pAddressLine'])
                and isset($_POST['pRegion'])
                and isset($_POST['pCountry'])
                and isset($_POST['pCity'])
                and isset($_POST['pPostalCode'])
                and isset($_POST['pImage1'])
                and isset($_POST['pEmail'])
                and isset($_POST['pPhoneNumber'])){

            $arr = array("FirstName" => $_POST['pFirstName']
                , "LastName" => $_POST['pLastName']
                , "AddressLine" => $_POST['pAddressLine']
                , "Region" => $_POST['pRegion']
                , "Country" => $_POST['pCountry']
                , "City" => $_POST['pCity']
                , "PostalCode" => $_POST['pPostalCode']
                , "Image1" => $_POST['pImage1']
                , "Email" => $_POST['pEmail']
                , "PhoneNumber" => $_POST['pPhoneNumber']);
            //$_FILES["file"]["name"]

        }
    }

    function action_register_organization(){
        if(isset($_POST['oFirstName']) 
                and isset($_POST['oLastName'])
                and isset($_POST['oAddressLine'])
                and isset($_POST['oRegion'])
                and isset($_POST['oCountry'])
                and isset($_POST['oCity'])
                and isset($_POST['oPostalCode'])
                and isset($_POST['oOrganization'])
                and isset($_POST['oPosition'])
                and isset($_POST['oImage1'])
                and isset($_POST['oImage2'])
                and isset($_POST['oImage3'])
                and isset($_POST['oImage4'])
                and isset($_POST['oEmail'])
                and isset($_POST['oPhoneNumber'])){
           


        }
    }

    function fileToBase64($file){
        $bin_string = file_get_contents();
        $hex_string = base64_encode($bin_string);
        return $hex_string;
    }

    function generation_login_view(){

        echo getLoginView();

    }

    function action_login(){

    }

    function generation_manager_view(){

        echo getManagerView();

    }


