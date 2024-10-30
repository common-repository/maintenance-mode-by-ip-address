<?php
/*
*	 Plugin Name: Maintenance Mode by IP Address
*	 Plugin URI: https://clenterprisesllc.com/
*	 Description: Quick & Easy Maintenance/Coming Soon Mode by IP Address allows you to exclude your site from visitors other than you, by using your IP address, while doing maintenance on your site. Simple and effective.
*
*	 Version: 3.0
*	 Author: Cabrera-Lalama Enterprises LLC
*	 Author URI: https://clenterprisesllc.com/
*/
//PLUGIN ACTIVATION FUNCTION
register_activation_hook(__FILE__, 'rc_mmipv3_activation');

function rc_mmipv3_activation(){
  
  $images_url = plugin_dir_url( __FILE__ );
  
  $generalSettings = array(
    'rc_mmip_switch' => 0,
    'rc_mmip_allowedip' => array(),
    'rc_mmip_whereto' => 0,
    'rc_mmip_url' => '',
    'rc_mmip_topage' => 'maintenance-by-ip',
    'rc_mmip_deleteondeact' => 1
  );
  
  $designSettings = array(
    'rc_mmip_inside_ctopt' => 0,
    'rc_mmip_inside_title' => '%blog_name% is coming soon...',
    'rc_mmip_inside_date' => '',
    'rc_mmip_inside_msg' => '',
    'rc_mmip_inside_bgopt' => 0,
    'rc_mmip_default_bg' => $images_url . '/templates/assets/img/slider/1.jpg',
    'rc_mmip_inside_custom_img' => ''
  );
  
  $socialSettings = array(
    'facebook' => '',
    'instagram' => '',
    'twitter' => '',
    'linkedin' => '',
    'pinterest' => '',
    'reddit' => ''
  );
  
  $mailchimpSettings = array(
    'rc_mmip_mchimp_section_title' => 'Let me know when your site is going to be available.',
    'rc_mmip_mchimp_opt' => 0,
    'rc_mmip_mchimp_api' => '',
    'rc_mmip_mchimp_list' => '',
    'rc_mmip_mchimp_after_msg' => 'Thank you for subscribing to our mailing list.',
    'rc_mmip_mchimp_gcaptcha' => 0,
    'rc_mmip_mchimp_gcaptcha_site' => '',
    'rc_mmip_mchimp_gcaptcha_secret' => ''
  );

	//check if the plugin options are already in the db
	$rc_mmip_options = get_option('rc_mmip_settings');
   
	if($rc_mmip_options){ 
    
    //Check if new version of plugin options are stored
    if(!empty($rc_mmip_options['generalSettings']) && is_array($rc_mmip_options['generalSettings'])){
            
      $generalSettings = array(
        'rc_mmip_switch' => $rc_mmip_options['generalSettings']['rc_mmip_switch'],
        'rc_mmip_allowedip' => $rc_mmip_options['generalSettings']['rc_mmip_allowedip'],
        'rc_mmip_whereto' =>$rc_mmip_options['generalSettings']['rc_mmip_whereto'],
        'rc_mmip_url' => $rc_mmip_options['generalSettings']['rc_mmip_url'],
        'rc_mmip_topage' => $rc_mmip_options['generalSettings']['rc_mmip_topage'],
        'rc_mmip_deleteondeact' => $rc_mmip_options['generalSettings']['rc_mmip_deleteondeact']
      );
      
      $designSettings = array(
        'rc_mmip_inside_ctopt' => $rc_mmip_options['designSettings']['rc_mmip_inside_ctopt'],
        'rc_mmip_inside_title' => $rc_mmip_options['designSettings']['rc_mmip_inside_title'],
        'rc_mmip_inside_date' => $rc_mmip_options['designSettings']['rc_mmip_inside_date'],
        'rc_mmip_inside_msg' => $rc_mmip_options['designSettings']['rc_mmip_inside_msg'],
        'rc_mmip_inside_bgopt' => $rc_mmip_options['designSettings']['rc_mmip_inside_bgopt'],
        'rc_mmip_default_bg' => $rc_mmip_options['designSettings']['rc_mmip_default_bg'],
        'rc_mmip_inside_custom_img' => $rc_mmip_options['designSettings']['rc_mmip_inside_custom_img']
      );

      $socialSettings = array(
        'facebook' => $rc_mmip_options['socialSettings']['facebook'],
        'instagram' => $rc_mmip_options['socialSettings']['instagram'],
        'twitter' => $rc_mmip_options['socialSettings']['twitter'],
        'linkedin' => $rc_mmip_options['socialSettings']['linkedin'],
        'pinterest' => $rc_mmip_options['socialSettings']['pinterest'],
        'reddit' => $rc_mmip_options['socialSettings']['reddit']
      );

      $mailchimpSettings = array(
        'rc_mmip_mchimp_section_title' => $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_section_title'],
        'rc_mmip_mchimp_opt' => $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_opt'],
        'rc_mmip_mchimp_api' => $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_api'],
        'rc_mmip_mchimp_list' => $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_list'],
        'rc_mmip_mchimp_after_msg' => $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_after_msg'],
        'rc_mmip_mchimp_gcaptcha' => $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_gcaptcha'],
        'rc_mmip_mchimp_gcaptcha_site' => $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_gcaptcha_site'],
        'rc_mmip_mchimp_gcaptcha_secret' => $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_gcaptcha_secret']
      );
      
      
      
    }else{
      
      $generalSettings = array(
        'rc_mmip_switch' => $rc_mmip_options['rc_mmip_switch'],
        'rc_mmip_allowedip' => $rc_mmip_options['rc_mmip_allowedip'],
        'rc_mmip_whereto' =>$rc_mmip_options['rc_mmip_whereto'],
        'rc_mmip_url' => $rc_mmip_options['rc_mmip_url'],
        'rc_mmip_topage' => $rc_mmip_options['rc_mmip_topage'],
        'rc_mmip_deleteondeact' => $rc_mmip_options['rc_mmip_deleteondeact']
      );
      
      $designSettings = array(
        'rc_mmip_inside_ctopt' => $rc_mmip_options['rc_mmip_inside_ctopt'],
        'rc_mmip_inside_title' => $rc_mmip_options['rc_mmip_inside_title'],
        'rc_mmip_inside_date' => $rc_mmip_options['rc_mmip_inside_date'],
        'rc_mmip_inside_msg' => $rc_mmip_options['rc_mmip_inside_msg'],
        'rc_mmip_inside_bgopt' => $rc_mmip_options['rc_mmip_inside_bgopt'],
        'rc_mmip_default_bg' => $rc_mmip_options['rc_mmip_default_bg'],
        'rc_mmip_inside_custom_img' => $rc_mmip_options['rc_mmip_inside_custom_img']
      );
      
      if(is_array($rc_mmip_options['rc_mmip_social']) && !empty($rc_mmip_options['rc_mmip_social'])){
        
        $facebookInfo = $rc_mmip_options['rc_mmip_social']['fb']['usernmae'];
        $twitterInfo = $rc_mmip_options['rc_mmip_social']['tw']['usernmae'];
        $instagramInfo = $rc_mmip_options['rc_mmip_social']['ig']['usernmae'];
        
      }else{
        $facebookInfo = '';
        $twitterInfo = '';
        $instagramInfo = '';
      }

      $socialSettings = array(
        'facebook' => $facebookInfo,
        'instagram' => $instagramInfo,
        'twitter' => $twitterInfo,
        'linkedin' => '',
        'pinterest' => '',
        'reddit' => ''
      );

      $mailchimpSettings = array(
        'rc_mmip_mchimp_section_title' => $rc_mmip_options['rc_mmip_mchimp_section_title'],
        'rc_mmip_mchimp_opt' => $rc_mmip_options['rc_mmip_mchimp_opt'],
        'rc_mmip_mchimp_api' => $rc_mmip_options['rc_mmip_mchimp_api'],
        'rc_mmip_mchimp_list' => $rc_mmip_options['rc_mmip_mchimp_list'],
        'rc_mmip_mchimp_after_msg' => $rc_mmip_options['rc_mmip_mchimp_after_msg'],
        'rc_mmip_mchimp_gcaptcha' => $rc_mmip_options['rc_mmip_mchimp_gcaptcha'],
        'rc_mmip_mchimp_gcaptcha_site' => $rc_mmip_options['rc_mmip_mchimp_gcaptcha_site'],
        'rc_mmip_mchimp_gcaptcha_secret' => $rc_mmip_options['rc_mmip_mchimp_gcaptcha_secret']
      );
      
    }
    
  }

  $rc_mmip_options = array(
    'generalSettings' => $generalSettings,
    'designSettings' => $designSettings,
    'socialSettings' => $socialSettings,
    'mailchimpSettings' => $mailchimpSettings
  );
  
  update_option('rc_mmip_settings', $rc_mmip_options);

}


//PLUGIN DEACTIVATION FUNCTION
function rc_mmipv3_deactivate(){
	
	$rc_mmip_options = get_option('rc_mmip_settings');
  
  if(!empty($rc_mmip_options['generalSettings']) && is_array($rc_mmip_options['generalSettings'])){
    $rc_mmip_deleteondeact = $rc_mmip_options['generalSettings']['rc_mmip_deleteondeact'];
  }else{
    $rc_mmip_deleteondeact = $rc_mmip_options['rc_mmip_deleteondeact'];
  }
	
	//wp_delete_post($rc_mmip_pageid, true);
	
	if($rc_mmip_deleteondeact == 1){
    
    $rc_mmip_page_slug = 'maintenance-by-ip';
    $rc_mmip_page_title = 'Maintenance by IP Address';
    
    
		delete_option( 'rc_mmip_settings' );
    
    //DELETE PAGE
    $mmipPage = get_page_by_path($rc_mmip_page_slug);

    if(isset($mmipPage)){

      $mmipPageId = $mmipPage->ID;
      wp_delete_post($mmipPageId, true);

    }
    
    
	}
	
}
register_deactivation_hook( __FILE__, 'rc_mmipv3_deactivate' );


if ( !function_exists( 'getCurrentRemoteAddress' ) ) {
    function getCurrentRemoteAddress() {
          return $_SERVER['REMOTE_ADDR'];
    } 
     
}

if ( !function_exists( 'getCurrentHttpXForwardedFor' ) ) {
    function getCurrentHttpXForwardedFor() {
       if ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
          //to check ip is pass from proxy
          return $_SERVER['HTTP_X_FORWARDED_FOR'];
      } 
      return null;
    }
}

if ( !function_exists( 'getCurrentHttpClientIP' ) ) {
    function getCurrentHttpClientIP() {
        if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
          //check ip from share internet
          return $_SERVER['HTTP_CLIENT_IP'];
        }
      return null;
    }
}


//add link to plugin in the menu page - admin
function rc_mmipv3_menu(){
  
	add_menu_page(
		'Maintenance Mode by IP',
		'MMIP',
		'manage_options',
		'rc-mmip',
		'rc_mmipv3_options_page', //function
		'dashicons-welcome-view-site',
		99
	);
	
}
add_action('admin_menu', 'rc_mmipv3_menu');


//Get current options, if any.
function rc_mmipv3_options_page(){

	if(!current_user_can('manage_options')){
		wp_die('You do not have sufficient permissions to access this page.');
	}

  $proxy1 = getCurrentHttpClientIP();
  $proxy2 = getCurrentHttpXForwardedFor();
  
  $currentIP = getCurrentRemoteAddress();
  
  $urlGeneral = add_query_arg(array(
            'page'=>'rc-mmip',
            'tab'=>'general'            
           ));
  
  $urlDesign = add_query_arg(array(
            'page'=>'rc-mmip',
            'tab'=>'design'            
           ));
  
  $urlSocial= add_query_arg(array(
            'page'=>'rc-mmip',
            'tab'=>'social'            
           ));
  
  $urlMailchimp= add_query_arg(array(
            'page'=>'rc-mmip',
            'tab'=>'mchimp'            
           ));
   
	$images_url = plugin_dir_url( __FILE__ );
  
  $pageArgs = array(
    'sort_order' => 'asc',
    'sort_column' => 'post_title',
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'meta_key' => '',
    'meta_value' => '',
    'authors' => '',
    'child_of' => 0,
    'parent' => -1,
    'exclude_tree' => '',
    'number' => '',
    'offset' => 0,
    'post_type' => 'page',
    'post_status' => 'publish'
  ); 
  
  $pages = get_pages($pageArgs);
  
  $directoryURL =  plugin_dir_url( __FILE__ ); 
  
	require('admin/admin_page.php');
  //require('includes/admin_opt.php');
}

//PROCESS FORM - POST - ADMIN
function rc_mmipv3_process_form(){
	
	//get saved options
	$rc_mmip_options = get_option('rc_mmip_settings');
  
	$rc_mmip_page_slug = 'maintenance-by-ip';
  $rc_mmip_page_title = 'Maintenance by IP Address';
  
	//Check if the form has being submitted
	if(isset($_POST['rc_maint_mode_submit'])){
    
    if(!empty($_POST['tab'])){
      
      if($_POST['tab'] == "design"){
        
        $countdownDate = "";
        
        if(!empty($_POST['rc_mmip_inside_ctopt'])){
          $showCountdown = (int) $_POST['rc_mmip_inside_ctopt'];
          
          if($_POST['rc_mmip_inside_date'] == ""){
            $countdownDate = date( 'm/d/Y H:i:s', strtotime('+30 minutes' , current_time( 'timestamp', 0 ) ) );
          }else{
            $countdownDate = sanitize_text_field($_POST['rc_mmip_inside_date']);
          }
         
        }else{
          $showCountdown = 0;
        }

        $newDesignSettings = array(
          'rc_mmip_inside_ctopt' => $showCountdown,
          'rc_mmip_inside_title' => sanitize_text_field($_POST['rc_mmip_inside_title']),
          'rc_mmip_inside_date' => $countdownDate,
          'rc_mmip_inside_msg' => sanitize_text_field($_POST['rc_mmip_inside_msg']),
          'rc_mmip_inside_bgopt' => sanitize_text_field($_POST['rc_mmip_inside_bgopt']),
          'rc_mmip_default_bg' => sanitize_text_field($_POST['rc_mmip_default_bg']),
          'rc_mmip_inside_custom_img' => sanitize_text_field($_POST['rc_mmip_inside_custom_img'])
        );
        
        $rc_mmip_options['designSettings'] = $newDesignSettings;
        
  
        
      }else if($_POST['tab'] == "social"){
        
        $newSocialSettings = array(
          'facebook' => sanitize_text_field($_POST['rc_mmip_fb']),
          'instagram' => sanitize_text_field($_POST['rc_mmip_instagram']),
          'twitter' => sanitize_text_field($_POST['rc_mmip_tw']),
          'linkedin' => sanitize_text_field($_POST['rc_mmip_linkedin']),
          'pinterest' => sanitize_text_field($_POST['rc_mmip_pinterest']),
          'reddit' => sanitize_text_field($_POST['rc_mmip_reddit'])
        );
        
        $rc_mmip_options['socialSettings'] = $newSocialSettings;
       
        
      }else if($_POST['tab'] == "mchimp"){
        
        if(!empty($_POST['rc_mmip_mchimp_opt']) && $_POST['rc_mmip_mchimp_api'] !== ""){
          $showMailChimpForm = (int) $_POST['rc_mmip_mchimp_opt'];
        }else{
          $showMailChimpForm = 0;
        }
        
        if(!empty($_POST['rc_mmip_mchimp_gcaptcha']) && $_POST['rc_mmip_mchimp_gcaptcha_site'] !== "" && $_POST['rc_mmip_mchimp_gcaptcha_secret'] !== ""){
          $showGoogleCaptcha = (int) $_POST['rc_mmip_mchimp_gcaptcha'];
        }else{
          $showGoogleCaptcha = 0;
        }
        
        $newMailchimpSettings = array(
          'rc_mmip_mchimp_section_title' => sanitize_text_field($_POST['rc_mmip_mchimp_section_title']),
          'rc_mmip_mchimp_opt' => $showMailChimpForm,
          'rc_mmip_mchimp_api' => sanitize_text_field($_POST['rc_mmip_mchimp_api']),
          'rc_mmip_mchimp_list' => sanitize_text_field($_POST['rc_mmip_list_id']),
          'rc_mmip_mchimp_after_msg' => sanitize_text_field($_POST['rc_mmip_mchimp_after_msg']),
          'rc_mmip_mchimp_gcaptcha' => $showGoogleCaptcha,
          'rc_mmip_mchimp_gcaptcha_site' => sanitize_text_field($_POST['rc_mmip_mchimp_gcaptcha_site']),
          'rc_mmip_mchimp_gcaptcha_secret' => sanitize_text_field($_POST['rc_mmip_mchimp_gcaptcha_secret'])
        );
        
        $rc_mmip_options['mailchimpSettings'] = $newMailchimpSettings;
        
      }else if($_POST['tab'] == "general"){
        
        if(!empty($_POST['rc_mmip_switch'])){
          
          $maintenanceModeSwitch = (int) $_POST['rc_mmip_switch'];
          
          //CREATE PAGE
          $mmipPage = get_page_by_path($rc_mmip_page_slug);
          
          if(!isset($mmipPage)){
            
            $new_post = array(
                'post_title' => $rc_mmip_page_title,
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page',
                'comment_status'   => 'closed',
                'ping_status'   => 'closed',
                'post_name'    => $rc_mmip_page_slug
              );

            $page_id = wp_insert_post($new_post); 
            
            update_post_meta( $page_id, '_wp_page_template', 'single-rc_mmip.php' );
            
            
          }
          
        }else{
          
          $maintenanceModeSwitch = 0;
          
          //DELETE PAGE
          $mmipPage = get_page_by_path($rc_mmip_page_slug);
          
          if(isset($mmipPage)){
            
            $mmipPageId = $mmipPage->ID;
            wp_delete_post($mmipPageId, true);
            
          }
          
        }
        
        if(!empty($_POST['rc_maint_mode_deleteondeact'])){
          $deleteSettingsonDeactSwitch = (int) $_POST['rc_maint_mode_deleteondeact'];
        }else{
          $deleteSettingsonDeactSwitch = 0;
        }
			
        if(isset($_POST['rc_mmip_allowedip']) && $_POST['rc_mmip_allowedip'] != ''){

          $rc_mmip_allowedip = array_map( 'sanitize_text_field', explode( "\n", $_POST['rc_mmip_allowedip'] ) );

        }else{
          $rc_mmip_allowedip = array($_SERVER['REMOTE_ADDR']);
        }
        
        
        $newGeneralSettings = array(
          'rc_mmip_switch' => $maintenanceModeSwitch,
          'rc_mmip_allowedip' => $rc_mmip_allowedip,
          'rc_mmip_whereto' => sanitize_text_field($_POST['rc_mmip_whereto']),
          'rc_mmip_url' => sanitize_text_field($_POST['rc_mmip_url']),
          'rc_mmip_topage' => sanitize_text_field($_POST['rc_mmip_topage']),
          'rc_mmip_deleteondeact' => $deleteSettingsonDeactSwitch
        );
       
        $rc_mmip_options['generalSettings'] = $newGeneralSettings;
        
      }else{
        
        $urlGeneral = add_query_arg(array(
          'page'=>'rc-mmip',
          'tab'=>'general'            
         ));
        
        echo '<script>alert("Invalid Request - Please try again."); window.location.href="'.$urlGeneral.'"; </script>';
        die();
        
      }
      
      update_option('rc_mmip_settings', $rc_mmip_options);
      
      $urlAfterPost = add_query_arg(array(
        'page'=>'rc-mmip',
        'tab'=> $_POST['tab']            
       ));
      
      wp_redirect($urlAfterPost);
    }

			
	}
  
  //this will happen everytime, any wordpress page loads.
  
  $disableMMIPModeForceFlag = false;
  
  $generalSet = $rc_mmip_options['generalSettings'];
  
  $rc_mmip_switch = (int) $generalSet['rc_mmip_switch'];
  $rc_mmip_remoteip = $generalSet['rc_mmip_allowedip'];
  $rc_mmip_whereto = (int) $generalSet['rc_mmip_whereto'];
  $rc_maint_mode_url = $generalSet['rc_mmip_url'];
  $rc_maint_topage = $generalSet['rc_mmip_topage'];
  $rc_mmip_deleteondeact = $generalSet['rc_mmip_deleteondeact'];
  $rc_mmip_disablemodephrase = $generalSet['rc_mmip_disablemodephrase'];

  
 
  if(!empty($_GET['redirect_to'])){
    
    $itIsComingFrom = explode("?",$_GET['redirect_to']);
    $disableMMIPModeForceFlag = true;
    
  }
  
  if(!empty($_POST['redirect_to'])){
    
    $itIsComingFrom = explode("?",$_POST['redirect_to']);
    $disableMMIPModeForceFlag = true;
    
  }
  
  
  //wp-admin/admin.php?page=rc-mmip&disablemmipmode
  if(isset($_GET['disablemmipmode'])){
 
    $uri_parts = explode('/', trim($_SERVER['REQUEST_URI']));
    $findAdminURL = explode('?', $uri_parts[2]);
    
    if(in_array("wp-admin",$uri_parts) &&  in_array("admin.php",$findAdminURL)){
      
           
      $disableMMIPModeForceFlag = true;    
     
      
      $currentUser = wp_get_current_user();
      
      if(!is_user_logged_in()){
        //die();
        auth_redirect();
        
      }else{
        
        if(in_array('administrator',  $currentUser->roles) && $rc_mmip_switch == 1){
          
          //DELETE PAGE
          $mmipPage = get_page_by_path($rc_mmip_page_slug);
          
          if(isset($mmipPage)){
            
            $mmipPageId = $mmipPage->ID;
            wp_delete_post($mmipPageId, true);
            
          }
          
          
          $changeGeneralSettings = array(
            'rc_mmip_switch' => 0,
            'rc_mmip_allowedip' => $rc_mmip_remoteip,
            'rc_mmip_whereto' => $rc_mmip_whereto,
            'rc_mmip_url' => $rc_maint_mode_url,
            'rc_mmip_topage' => $rc_maint_topage,
            'rc_mmip_deleteondeact' => $rc_mmip_deleteondeact,
            'rc_mmip_disablemodephrase' => $rc_mmip_disablemodephrase
          );

          $rc_mmip_options['generalSettings'] = $changeGeneralSettings;

          update_option('rc_mmip_settings', $rc_mmip_options);
          
          wp_redirect( admin_url( 'admin.php?page=rc-mmip') );
          exit; 
          
        }
        
      } 
      
    }
    
  }

  
 if(!$disableMMIPModeForceFlag){ 
    //Check if maintenance mode is on
    if($rc_mmip_switch == 1){

      $remote =  getCurrentRemoteAddress();

      if(!wp_doing_ajax()){

        if(!(in_array($remote, $rc_mmip_remoteip))){

          if($rc_mmip_whereto == 0){

            if ( trim( $_SERVER['REQUEST_URI'], '/' ) != $rc_mmip_page_slug ) {
              show_admin_bar(false);
              wp_redirect( get_permalink( get_page_by_path( $rc_mmip_page_slug ) ) , 301 );
              exit;            
            }

          }else{

            wp_redirect( $rc_maint_mode_url );
            exit;

          }

        } 
      }
    }else{
      //IF MAINTENANCE MODE IF OFF, AND USERS VISIT MAINTENANCE PAGE SLUG, THEN SEND THEM TO HOME PAGE.
      if ( trim( $_SERVER['REQUEST_URI'], '/' ) == $rc_mmip_page_slug ) {
        wp_redirect( home_url() );
        exit;            
      }
    }

 }  
  
}

add_action( 'init', 'rc_mmipv3_process_form' );

//Ajax from Front End.
function rc_maintv3_mchimp_action(){
	
	//get saved options
	$rc_mmip_options = get_option('rc_mmip_settings');
	$apikey = $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_api'];
	$listID = $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_list'];
	$rc_mmip_mchimp_gcaptcha = $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_gcaptcha'];
	$rc_mmip_mchimp_after_msg = $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_after_msg'];
  
  $mmipGoogleCaptchaSiteKey = $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_gcaptcha_site'];
  $mmipGoogleCaptchaSecretKey = $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_gcaptcha_secret'];
  
  $okToProcess = true;
	
	//google secret key - check if google reCaptcha is available (has been selected)
	if($rc_mmip_mchimp_gcaptcha == 1){
		
    $captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
    
    if(!$captcha){
      echo 'Your request cannot be processed at this time. Please refresh this page and try again.';
      wp_die();
    }
    
    $secretKey = $mmipGoogleCaptchaSecretKey;
    $ip = getCurrentRemoteAddress();
    
    $googleCaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    
    $data = array('secret' => $secretKey, 'response' => $captcha);
    
    $response = wp_remote_post( $googleCaptchaUrl, array(
        'body'    => $data,
        'headers' => array( 
              'Content-Type' => 'application/x-www-form-urlencoded'
        ),
        'timeout' => 10
    ) );

    $decodedRes = json_decode($response['body'], true);
    
    if($decodedRes["success"] == false) {
      $okToProcess = false;
    } 
   
	}
	
	if($_POST['email'] == ''){
		
		echo 'No email address has been provided.';
		wp_die();
		
	}else if(!is_email($_POST['email'])){
		
		echo 'Please enter a valid email.';
		wp_die();
		
	}else{
		
		$email = sanitize_email($_POST['email']);
		
	}
  
  if($okToProcess){
  
    $dc = explode('-', $apikey);
    $auth = base64_encode( 'user:'.$apikey );
    $mailchimpEndpoint = 'https://'.$dc[1].'.api.mailchimp.com/3.0/lists/' . $listID . '/members/';

    $data = array(
      'apikey'        => $apikey,
      'email_address' => $email,
      'status'        => 'subscribed'
    );

    $json_data = json_encode($data);

    $response = wp_remote_post( $mailchimpEndpoint, array(
        'body'    => $json_data,
        'headers' => array( 
              'Content-Type' => 'application/json',
              'Authorization'=> 'Basic ' .  $auth
        ),
        'timeout' => 10
    ) );

    $receivedJson = json_decode($response['body'], true);

    if($receivedJson['status'] == 'subscribed'){

      echo esc_html($rc_mmip_mchimp_after_msg);

    }else if($receivedJson['status'] == '400'){

      $error = $pieces = preg_split('/(?=[A-Z])/',$receivedJson['detail']); // explode('.',$receivedJson['detail'] );

      if (strpos($receivedJson['detail'], $email) !== false) {

        echo $error[0];

      }else{

        echo 'There was an error when trying to subscribe you to our mailing list. Please try again later.';	

      }

    }else if($receivedJson['status'] == '500'){

      echo 'There was a problem on MailChimp servers. Please try again later.';

    }
    
  }else{
    
    echo 'Your request cannot be processed at this time. Please refresh this page and try again.';
    
  }
  
	wp_die();
  
}

//Add a link to the Admin Bar
function rc_mmipv3_adminbar_link( $wp_admin_bar ) {
	
	$rc_mmip_options = get_option('rc_mmip_settings');
	$rc_mmip_switch = $rc_mmip_options['generalSettings']['rc_mmip_switch'];

	if($rc_mmip_switch != 0){
		
		$rc_maint_mode_text = 'Maintenance Mode: <span id="rc_maint_mode_text" class="on">ON</span>';
		$args = array(
			'id'    => 'rc_maint_mode',
			'title' => $rc_maint_mode_text,
			'href' => '/wp-admin/admin.php?page=rc-mmip',
			'meta'  => array( 'class' => 'rc-mmip' )
		);
		$wp_admin_bar->add_node( $args );
		
	}
	
}
add_action( 'admin_bar_menu', 'rc_mmipv3_adminbar_link', 999 );



//Enable ajax
function rc_mmipv3_enable_frontend_ajax(){
	
	$rc_mmip_options = get_option('rc_mmip_settings');
	
	
	if($rc_mmip_options['designSettings']['rc_mmip_inside_date'] != ''){
		$rc_mmip_inside_date = $rc_mmip_options['designSettings']['rc_mmip_inside_date'];
	}
	
?>
	<script>
		
		var rcmmipAjaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';
		var rcmmip_date = '<?php echo $rc_mmip_inside_date; ?>';

	</script>
<?php
}
//add to front end
add_action('wp_head','rc_mmipv3_enable_frontend_ajax');


//add to back end
add_action('admin_footer', 'rc_mmipv3_enable_frontend_ajax');

add_action( 'wp_ajax_rc_mmipv3_mchimp_action', 'rc_maintv3_mchimp_action' );
add_action( 'wp_ajax_nopriv_rc_mmipv3_mchimp_action', 'rc_maintv3_mchimp_action' );

//Get MailChimp List for current api
function rc_mmipv3_mchimp_lists(){
	
	if(isset($_POST['chimp_api'])){
		$mchimp_api = esc_html($_POST['chimp_api']);
	}else{
		//get saved options
		$rc_mmip_options = get_option('rc_mmip_settings');
		$mchimp_api = $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_api'];
		$rc_mmip_mchimp_list = $rc_mmip_options['mailchimpSettings']['rc_mmip_mchimp_list'];
	}

	$dc = explode('-', $mchimp_api);
	$auth = base64_encode( 'user:'.$mchimp_api );
	$mailchimpEndpoint = 'https://'.$dc[1].'.api.mailchimp.com/3.0/lists/';

	$response = wp_remote_get( $mailchimpEndpoint ,
         array( 
    'timeout' => 10,
          'headers' => array( 
            'Content-Type' => 'application/json',
            'Authorization'=> 'Basic ' .  $auth
          ) 
    )
  );
	
	$receivedJson = json_decode($response['body'], true);
  	
	if(isset($_POST['chimp_api'])){
    
		//Get List ID
		if(is_array($receivedJson['lists'])){
      
			$output .= '<select name="rc_mmip_list_id" id="rc_mmip_list_id">';

			foreach($receivedJson['lists'] as $list){
				$output .= "<option value='". $list['id']."'>". $list['name']."</option>";
			}
      
			$output .= '</select>';
      
			echo $output;
      
		}	
		
	}else{
    
		if(is_array($receivedJson['lists'])){
			echo '<select name="rc_mmip_list_id" id="rc_mmip_list_id">';

			foreach($receivedJson['lists'] as $list){
				echo "<option value='". $list['id']."'" . selected($rc_mmip_mchimp_list, $list['id']) . ">". $list['name']."</option>";
			}
      
			echo '</select>';
      
		}
    
	}
  
  //To avoid a weird 0 returned at the end of ajax called.
  if(isset($_POST['chimp_api'])){
		wp_die();
	}
}

add_action( 'wp_ajax_rc_mmipv3_mchimp_lists', 'rc_mmipv3_mchimp_lists' );


function mmipv3_template_chooser($template){
	
  $plugindir = dirname(__FILE__);
	
	if(is_page('maintenance_mode-ip')){
		return $plugindir . '/templates/single-rc_mmip.php';
	}
	
  return $template;  
  
}

add_filter('template_include', 'mmipv3_template_chooser');


// Filter page template
add_filter('page_template', 'mmipv3_plugin_template');

// Page template filter callback
function mmipv3_plugin_template($template) {
    // If single-rc_mmip.php is the set template
    if( is_page_template('single-rc_mmip.php') )
        // Update path(must be path, use WP_PLUGIN_DIR and not WP_PLUGIN_URL) 
        $template = WP_PLUGIN_DIR . '/maintenance-by-ip-address/templates/single-rc_mmip.php';
    // Return
    return $template;
}

//Add css stylesheet to admin head.
function rc_mmipv3_styles(){
	wp_enqueue_style('rc_mmip_backend_css',  plugin_dir_url( __FILE__ ) . 'admin/css/rc_maint_backend.css');
}

add_action('admin_enqueue_scripts','rc_mmipv3_styles');