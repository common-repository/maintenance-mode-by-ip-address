jQuery(document).ready(function($) {
  
  $(".mmip_setting_switch").click(function(){
    var switchValue = parseInt($(this).find("input[type=checkbox]").val());
    
    if(switchValue == 0 ){
      
      $(this).find("input[type=checkbox]").val("1");
      $(this).find("input[type=checkbox]").prop("checked",true);
      
    }else{
      
      $(this).find("input[type=checkbox]").val("0");
      $(this).find("input[type=checkbox]").prop("checked",false);
      
    }
    return false;
  });
  
  $("#mmipBackgroundOpt").change(function(){
    var value = parseInt($(this).val());
    
    if(value == 1){
      $(".mmip_tab_content_predifinedBgs").css({"display":"none"});
      $(".mmip_tab_content_customBg").css({"display":"table"});
      return false;
    }
    
    $(".mmip_tab_content_predifinedBgs").css({"display":"table"});
    $(".mmip_tab_content_customBg").css({"display":"none"});
    
  });

	
  
  $(".showCountdownOpt").click(function(){
    var value = parseInt($(this).find("input[type=checkbox]").val());
    
    if(value == 1){
      $(".mmip_tab_content_countdownPicker").css({"display":"table"});
      return false;
    }
    
    $(".mmip_tab_content_countdownPicker").css({"display":"none"});
  });
  
  $(".showMailChimpForm").click(function(){
    var value = parseInt($(this).find("input[type=checkbox]").val());
    
    if(value == 1){
      $(".mmip_setting_content_mailchimp_details").show();
      return false;
    }
    
    $(".mmip_setting_content_mailchimp_details").hide();
  });
  
  $(".showGoogleCaptchaMore").click(function(){
    var value = parseInt($(this).find("input[type=checkbox]").val());
    
    if(value == 1){
      $(".googlecaptcha_moredetails").show();
      return false;
    }
    
    $(".googlecaptcha_moredetails").hide();
  });
  
  
	
	$(".set_custom_images").click(function(e){
		
		if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
			e.preventDefault();
			var custom_uploader;
				//Extend the wp.media object
			custom_uploader = wp.media.frames.file_frame = wp.media({
				title: 'Choose Image',
				button: {
					text: 'Choose Image'
				},
				multiple: false
			});

			//When a file is selected, grab the URL and set it as the text field's value
			custom_uploader.on('select', function() {
				attachment = custom_uploader.state().get('selection').first().toJSON();
				$('#rc_mmip_inside_custom_img').val(attachment.url);
			});

			//Open the uploader dialog
			custom_uploader.open();
			return false;
		}
	});
	
	$('#rc_maint_whereto').change(function() {
		var value = $(this).val();
		if (value == '0') {
			$(".mmip_tab_content_url").css({"display":"none"});
			$(".mmip_tab_content_page").css({"display":"table"});
		} else {
			$(".mmip_tab_content_url").css({"display":"table"});
			$(".mmip_tab_content_page").css({"display":"none"});
		}
	});

	$("#rc_mmip_mchimp_gcaptcha").change(function() {
		var v = $(this).val();
		if (v != 0) {
			$(".google_captcha_keys").fadeIn();
		} else {
			$(".google_captcha_keys").hide();
		}
	});
	
	
	$("#rc_mmip_mchimp_opt").change(function() {
		var v = $(this).val();
		if (v != 0) {
			$(".rc_mmip_mchimp_field, .section_title, .google_captcha_opt, .successful_msg").fadeIn();
		} else {
			$(".rc_mmip_mchimp_field, .rc_mmip_mchimp_lists").hide();
			$(".section_title, .google_captcha_opt, .google_captcha_keys, .successful_msg").hide();
			$("#rc_mmip_mchimp_gcaptcha").val("0");
		}
	});

	$('#rc_maint_mode_submit').click(function() {

		if ($('#rc_maint_whereto').val() == '1' && $('#rc_maint_mode_url').val() == '') {
			alert('Please enter a URL to redirect the unauthorized user to.');
			$('#rc_maint_mode_url').focus();
			return false;
		}
	});

	
	$("#rc_mmip_inside_bgopt").change(function(){
		var x = $(this).val();
		
		if(x != 1){
			$(".rc_mmip_default_bg_container").fadeIn();
			$(".rc_mmip_default_custom_container").hide();
			$(".rc_mmip_custom_img_preview").hide();
			$("#rc_mmip_inside_custom_img").val("");
		}else{
			$(".rc_mmip_default_custom_container").fadeIn();
			$(".rc_mmip_default_bg_container").hide();
		}
	});
	
	$(".rc_mmip_images_layout li img").click(function(){
		var url = $(this).attr('src');
		$(".rc_mmip_images_layout").find('.active_li').removeClass('active_li');
		$(this).parent('li').addClass('active_li');
		$("#rc_mmip_default_bg").val(url);
    $("#rc_mmip_inside_custom_img").val("");
	});
	
	
	$("#rc_mmip_inside_ctopt").change(function(){
		var z = $(this).val();
		if(z == 1){
			$(".rc_mmip_countdown_date_picker").fadeIn();
		}else{
			$(".rc_mmip_countdown_date_picker").hide();
		}
	});	
});