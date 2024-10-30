<?php
	
$rc_mmip_options = get_option('rc_mmip_settings');

$mailchimpSet = $rc_mmip_options['mailchimpSettings'];

$mmipMailChimpFormTitle = $mailchimpSet['rc_mmip_mchimp_section_title'];
$mmipMailChimpShowForm = $mailchimpSet['rc_mmip_mchimp_opt'];
$mmipMailChimpAPIKey = $mailchimpSet['rc_mmip_mchimp_api'];
$mmipMailChimpList = $mailchimpSet['rc_mmip_mchimp_list'];
$mmipMailChimpFormSuccessfulMsg = $mailchimpSet['rc_mmip_mchimp_after_msg'];
$mmipGoogleCaptchaShow = $mailchimpSet['rc_mmip_mchimp_gcaptcha'];
$mmipGoogleCaptchaSiteKey = $mailchimpSet['rc_mmip_mchimp_gcaptcha_site'];
$mmipGoogleCaptchaSecretKey = $mailchimpSet['rc_mmip_mchimp_gcaptcha_secret'];

// var_dump($mailchimpSet);

?>

<script>
  jQuery(document).ready(function($) {

    var mailchimpOpt = parseInt("<?php echo $mmipMailChimpShowForm; ?>");
    var googleCOpt = parseInt("<?php echo $mmipGoogleCaptchaShow; ?>");

    $("#mmipMailChimpSwitch").val(mailchimpOpt);
    $("#mmipGoogleCSwitch").val(googleCOpt);

    if (mailchimpOpt == 1){
      
      $(".mmip_setting_content_mailchimp_details").show();
      
    }else{
      $(".mmip_setting_content_mailchimp_details").hide();
    }
    
    if(googleCOpt == 1){
      $(".googlecaptcha_moredetails").show();
    }else{
      $(".googlecaptcha_moredetails").hide();
    }
    
    
    <?php if ($mmipMailChimpList != ""){ ?>
        $(".rc_mmip_mchimp_lists").show();
     <?php  }else{ ?>
      $(".rc_mmip_mchimp_lists").hide();
    <?php  } ?>
  
    
    $("#load_mchimp_list_btn").click(function(){
		
      var chimp_api = $('#rc_mmip_mchimp_api').val();

      if( chimp_api != ''){
        var data = {
          'action': 'rc_mmipv3_mchimp_lists',
          'chimp_api': chimp_api
        };


        $.post(rcmmipAjaxurl,data, function(res){
          $(".list_spot").html(res);
          $(".rc_mmip_mchimp_lists").fadeIn();
        });	

      }else{
        alert('Please enter your MailChimp API.');
      }


    });
    
    
  });
</script>


<form name="rc_maint_mode_form" id="rc_maint_mode_form" method="post" action=""> 
  
  <input type="hidden" name="tab" value="mchimp">
  
  <div class="mmip_tab_content_title">
    MailChimp Settings
  </div>
  
  <div class="mmip_tab_content_main">
    
    <div class="mmip_tab_content_form_field">
      <label>Add Mailchimp Subscribe Form?</label>
      <label class="mmip_setting_switch showMailChimpForm">
        <input type="checkbox" class="mmip_setting_switch_checkbox" name="rc_mmip_mchimp_opt" id="mmipMailChimpSwitch" <?php if($mmipMailChimpShowForm == 1): ?> checked <?php endif; ?> value="<?php echo $mmipMailChimpShowForm; ?>">
        <span class="mmip_setting_slider round"></span>
      </label>
    </div>
    <div class="mmip_setting_content_mailchimp_details">
      
      <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table">
        <label>MailChimp API Key</label>
        <div>
          <input type="text" name="rc_mmip_mchimp_api" id="rc_mmip_mchimp_api" class="regular-text" value="<?php echo esc_html($mmipMailChimpAPIKey);  ?>"> 
          <input class="button-primary" type="button" name="load_mchimp_list_btn" id="load_mchimp_list_btn" value="<?php esc_attr_e( 'Load Lists' ); ?>" />
          <span class="mmip_tab_content_textsmall">Please enter your MailChimp API. To learn more about how you can get an API from Mailchimp, <a href="http://kb.mailchimp.com/accounts/management/about-api-keys" target="_blank">click here</a>.</span>
        </div> 
      </div>
      
      <div class="rc_mmip_mchimp_lists">
        <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table">
          <label><?php if($mmipMailChimpList != ''){ echo 'List selected: '; } else{ echo 'Select a List'; } ?></label>
          <div class="list_spot">
            <?php if($mmipMailChimpList != ''): rc_mmip_mchimp_lists();  endif; ?> 
          </div> 
        </div>  
      </div>
      
      
      <div class="mmip_tab_content_form_field">
        <label>MailChimp Form Title</label>
        <input type="text" class="regular-text" name="rc_mmip_mchimp_section_title" value="<?php echo esc_html($mmipMailChimpFormTitle); ?>">
      </div>
      
      
      

      <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table">
        <label>MailChimp Form Successful Message</label>
        <div>
          <input type="text" class="regular-text" name="rc_mmip_mchimp_after_msg" value="<?php echo esc_html($mmipMailChimpFormSuccessfulMsg); ?>">
          <span class="mmip_tab_content_textsmall">This message will be displayed after the user has successfully entered his/her email address. Default: Thank you for subscribing to our mailing list.</span>
        </div>
      </div>
      
      <div class="mmip_setting_content_googlecaptcha_details">

        <div class="mmip_tab_content_form_field">
          <label>Add Google reCaptcha?</label>
          <label class="mmip_setting_switch showGoogleCaptchaMore">
            <input type="checkbox" class="mmip_setting_switch_checkbox" name="rc_mmip_mchimp_gcaptcha" id="mmipGoogleCSwitch" <?php if($mmipGoogleCaptchaShow == 1): ?> checked <?php endif; ?> value="<?php echo $mmipGoogleCaptchaShow; ?>">
            <span class="mmip_setting_slider round"></span>
          </label>

        </div>

        <div class="googlecaptcha_moredetails">

          <div class="mmip_tab_content_form_field">
            <span class="mmip_tab_content_textsmall">
              Currently supporting reCaptcha v3. <a href="https://developers.google.com/recaptcha/docs/v3" target="_blank">Click here to learn more.</a>
              <br />
              Generate your reCaptcha v3 site &amp; secret keys and insert them below. <a href="https://www.google.com/recaptcha/admin/create" target="_blank">Click here to generate your keys.</a>
            </span>
          </div>

          <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table">
            <label>Google reCaptcha v3 Site Key</label>
            <div>
              <input type="text" name="rc_mmip_mchimp_gcaptcha_site" id="rc_mmip_mchimp_gcaptcha_site" class="regular-text" value="<?php echo esc_html($mmipGoogleCaptchaSiteKey);  ?>">
            </div>
          </div> 

          <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table">
            <label>Google reCaptcha v3 Secret Key</label>
            <div>
              <input type="text" name="rc_mmip_mchimp_gcaptcha_secret" id="rc_mmip_mchimp_gcaptcha_secret" class="regular-text" value="<?php echo esc_html($mmipGoogleCaptchaSecretKey);  ?>">
            </div>
          </div>   
        </div>

      </div>
      
    </div>

  </div> 
  
  <div class="mmip_tab_content_action_btn">
    <button type="submit" name="rc_maint_mode_submit">
      Save MailChimp Settings
    </button>
  </div>
  
</form>