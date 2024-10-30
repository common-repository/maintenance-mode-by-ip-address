<?php
	
$rc_mmip_options = get_option('rc_mmip_settings');

$designSet = $rc_mmip_options['designSettings'];

$mmipDesignTitle = $designSet['rc_mmip_inside_title'];
$mmipDesignShowCounter = $designSet['rc_mmip_inside_ctopt'];
$mmipDesignCounterDate = $designSet['rc_mmip_inside_date'];
$mmipDesignMsg = $designSet['rc_mmip_inside_msg'];
$mmipDesignBGOpt = $designSet['rc_mmip_inside_bgopt'];
$mmipDesignDefaultBG = $designSet['rc_mmip_default_bg'];
$mmipDesignCustomBG = $designSet['rc_mmip_inside_custom_img'];

$img = substr($mmipDesignDefaultBG, -5); //its because the image name (with extension) is 5 characters long.

$content = $mmipDesignMsg;
$editor_id = 'rcmmipinsidemsg';
$settings = array(
  'wpautop' => false,
  'media_buttons' =>  false,
  'textarea_name' => 'rc_mmip_inside_msg',
  'textarea_rows' => 5,
  'tabindex' => '0',
  'editor_css' => '',
  'editor_class' => '',
  'teeny' => false,
  'quicktags' => false
);

// echo "<pre>"; var_dump($designSet); echo "</pre>";

?>

<script>
  jQuery(document).ready(function($) {
    
    $("#rc_mmip_inside_date").datetimepicker({
      format: 'm/d/Y H:i',
      minDate: '0',
      step: 30
    });

    var bgOpt = parseInt("<?php echo $mmipDesignBGOpt; ?>");
    $("#mmipBackgroundOpt").val(bgOpt);

    if (bgOpt == 1){ //url selected
       
       $(".mmip_tab_content_customBg").css({"display":"block"}); //show url input field
       $(".mmip_tab_content_predifinedBgs").css({"display":"none"}); //hide page dropdown
    }else{
       $(".mmip_tab_content_customBg").css({"display":"none"});
    }
    
    $("#rc_mmip_default_bg").val("<?php echo $mmipDesignDefaultBG; ?>");
    
    var sCounter = parseInt("<?php echo $mmipDesignShowCounter; ?>");
    
    if(sCounter == 1){
      $(".mmip_tab_content_countdownPicker").css({"display":"table"});
    }else{
      $(".mmip_tab_content_countdownPicker").css({"display":"none"});
    }


  });
</script>

<form name="rc_maint_mode_form" id="rc_maint_mode_form" method="post" action=""> 
  
  <input type="hidden" name="tab" value="design">
  
  <div class="mmip_tab_content_title">
    Design Settings
  </div>
  
  <div class="mmip_tab_content_main">
    
    <div class="mmip_tab_content_form_field">
      <p>
        Customize the page your visitors will see during maintenance mode. 
      </p>
    </div>
    
    <div class="mmip_tab_content_form_field"> 
      <label>Page Header<br /><span class="mmip_tab_content_textsmall">To add your blog name in the title, add '%blog_name%' to the text.</span></label>
      <input type="text" name="rc_mmip_inside_title" id="rc_mmip_inside_title" value="<?php echo $mmipDesignTitle; ?>" style="width: 500px;">
    </div>
      
    <div class="mmip_tab_content_form_field">
      <label>Show Countdown?</label>
      <label class="mmip_setting_switch showCountdownOpt">
        <input type="checkbox" class="mmip_setting_switch_checkbox" name="rc_mmip_inside_ctopt" <?php if($mmipDesignShowCounter == 1): ?> checked <?php endif; ?> value="<?php echo $mmipDesignShowCounter; ?>">
        <span class="mmip_setting_slider round"></span>
      </label>
    </div>
      
    <div class="mmip_tab_content_form_field mmip_tab_content_countdownPicker mmip_tab_content_form_field_table" >
      <label>When will your site be ready?<span class="mmip_tab_content_textsmall">Date and time.</span></label>
      <div>
      <input type="text" name="rc_mmip_inside_date" id="rc_mmip_inside_date" value="<?php  if($mmipDesignCounterDate != '') : echo date('Y/m/d H:i', strtotime($mmipDesignCounterDate)); endif; ?>">
      <span class="mmip_tab_content_textsmall">
      If no date/time is provided, and maintenance mode is set to 'ON', a default date will be used. Default: current date/time + 30 minutes. 
      <br />Make sure to select the appropiate timezone in the Wordpress Settings Page. <br /><br />Please note: if a counter is shown, and the time expires, the counter will become hidden.
      </span>  
      </div>
      
    </div>
  
    <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table">
      <label>Custom Message</label>
      <?php wp_editor( $content, $editor_id , $settings ); ?>
    </div> 
        
    <div class="mmip_tab_content_form_field">
      <label>Background</label>
      <select name="rc_mmip_inside_bgopt" id="mmipBackgroundOpt">
          <option value="0">Predefined Backgrounds</option>
          <option value="1">Custom Background</option>
        </select>
    </div>
    
    <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table mmip_tab_content_predifinedBgs">
      <label>Predefined Backgrounds</label>
      <ul class="rc_mmip_images_layout">
        <li class="<?php if($img == '1.jpg'){ echo 'active_li'; }else if($mmipDesignDefaultBG == ''){ echo 'active_li'; } ?>"><img src="<?php echo $images_url; ?>templates/assets/img/slider/1.jpg" width="200"></li>
        <li class="<?php if($img == '2.jpg'): echo 'active_li'; endif; ?>"><img src="<?php echo $images_url; ?>templates/assets/img/slider/2.jpg" width="200"></li>
        <li class="<?php if($img == '3.jpg'): echo 'active_li'; endif; ?>"><img src="<?php echo $images_url; ?>templates/assets/img/slider/3.jpg" width="200"></li>
        <li class="<?php if($img == '4.jpg'): echo 'active_li'; endif; ?>"><img src="<?php echo $images_url; ?>templates/assets/img/slider/4.jpg" width="200"></li>
      </ul>
      <input type="hidden" name="rc_mmip_default_bg" id="rc_mmip_default_bg" value="">
    </div>
    
    <div class="mmip_tab_content_form_field mmip_tab_content_customBg">
      <label>Upload a background<br /><span class="mmip_tab_content_textsmall">Minimum Size: 1300x867 pixels - Landscape</span></label>
      <input type="text" class="regular-text process_custom_images" id="rc_mmip_inside_custom_img" name="rc_mmip_inside_custom_img" value="<?php echo $mmipDesignCustomBG; ?>">
			<button class="set_custom_images button">Select Image</button>
    </div>    
    <?php if($mmipDesignCustomBG !== "") { ?>
    
    <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table">
      <label>Current Custom Saved Image</label>
     <img src="<?php echo $mmipDesignCustomBG; ?>" width="200">
    </div> 
    
    <?php } ?>
  </div>
  <div class="mmip_tab_content_action_btn">
    <button type="submit" name="rc_maint_mode_submit">
      Save Design Settings
    </button>
  </div>
</form>