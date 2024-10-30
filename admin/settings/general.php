<?php
	
	$rc_mmip_options = get_option('rc_mmip_settings');
  
  $generalSet = $rc_mmip_options['generalSettings'];

  $mmipMaintenanceSwitch = $generalSet['rc_mmip_switch'];
  $mmipAllowedIP = implode("\n", $generalSet['rc_mmip_allowedip']);
  $mmipWhereTo = $generalSet['rc_mmip_whereto'];
  $mmipGoToURL = $generalSet['rc_mmip_url'];
  $mmipToPage = $generalSet['rc_mmip_topage'];
  $mmipDeleteOnDeactivation = $generalSet['rc_mmip_deleteondeact'];
?>

<script>
  jQuery(document).ready(function($) {

    var whereToSelected = parseInt("<?php echo $mmipWhereTo; ?>");
    $("#rc_maint_whereto").val(whereToSelected);
    
    if (whereToSelected == 1){ //url selected
       $("#mmip_url").val("<?php echo $mmipGoToURL; ?>");
       $(".mmip_tab_content_url").css({"display":"table"}); //show url input field
       $(".mmip_tab_content_page").css({"display":"none"}); //hide page dropdown
    }
    
   $("#rc_maint_mode_page").val("<?php echo $mmipToPage; ?>"); 
    
   $("form").submit(function(){
     
     var currentIP = "<?php echo $currentIP; ?>";
    
     var ips = $('#mmip_tab_content_textarea').val().split("\n");
     var mmipMode = $('.mmip_setting_switch_checkbox').val();
     
     if(mmipMode == 1){
       if($.inArray(currentIP, ips) == -1){
         var ok = confirm("Your Current IP is not included in the allowed IPs textarea below.\n\n You may get locked out.\n\nDo you want to continue?");

         if(!ok){
           $('#mmip_tab_content_textarea').focus();
           return false;
         }
       }  
     }
     
   });
   
  });
</script>
<form name="rc_maint_mode_form" id="rc_maint_mode_form" method="post" action=""> 
  
  <input type="hidden" name="tab" value="general">
  
  <div class="mmip_tab_content_title">
    General Settings
  </div>
  
  <div class="mmip_tab_content_main">

      <div class="mmip_tab_content_form_field">
        <p style="color: #ff0000;">
          <b>IMPORTANT</b>: If you ever get <u>locked out</u>, visit <em><?php echo home_url(); ?>/wp-admin/admin.php?page=rc-mmip&amp;disablemmipmode</em>
          <br />
          THIS WILL ONLY WORK FOR ADMINISTRATOR USERS.
        </p>  
      </div>
      <div class="mmip_tab_content_form_field">
        <label>Maintenance Mode</label>
        <label class="mmip_setting_switch">
          <input type="checkbox" class="mmip_setting_switch_checkbox" name="rc_mmip_switch" <?php if($mmipMaintenanceSwitch == 1): ?> checked <?php endif; ?> value="<?php echo $mmipMaintenanceSwitch; ?>">
          <span class="mmip_setting_slider round"></span>
        </label>
      </div>
      
      <div class="mmip_tab_content_form_field mmip_tab_content_form_field_table">
        <label>IP Address(es) that should<br /> have access to the site. <span class="mmip_tab_content_textsmall">Please enter one IP Address per line. If maintenance mode is activated, and no IP address is provided, your current IP address will be used.</span></label>
        <textarea id="mmip_tab_content_textarea" name="rc_mmip_allowedip" cols="25" rows="10"><?php if($mmipAllowedIP != "") { echo $mmipAllowedIP; } else { echo $currentIP; } ?></textarea>   
      </div>
      
      <div class="mmip_tab_content_form_field">
        <label>Send unauthorized visitors to:</label>
        <select name="rc_mmip_whereto" id="rc_maint_whereto" >
          <option value="0">Page</option>
          <option value="1">URL</option>
        </select>
      </div>
  
        <div class="mmip_tab_content_form_field mmip_tab_content_page">
          <label>Page to use: </label>
            <select name="rc_mmip_topage" id="rc_maint_mode_page" >
              <option value="maintenance-by-ip">MMIP Page</option>
              <?php
                foreach($pages as $page){
                  ?>
                    <option value="<?php echo $page->post_name ; ?>"> <?php echo $page->post_title; ?></option>
                  <?php	
                }
              ?>	
						</select>
        </div> 
        
        <div class="mmip_tab_content_form_field mmip_tab_content_url">
          <label>URL:<span class="mmip_tab_content_textsmall">Include http:// or https://</span></label>
          <input type="url" name="rc_mmip_url" id="mmip_url" value="<?php echo $mmipGoToURL;  ?>" placeholder="Insert URL">
        </div>

      <div class="mmip_tab_content_form_field">
        <label>Delete saved settings <br />on deactivation?</label>
        <label class="mmip_setting_switch">
          <input type="checkbox" class="mmip_setting_switch_checkbox" name="rc_maint_mode_deleteondeact" <?php if($mmipDeleteOnDeactivation == 1): ?> checked <?php endif; ?> value="<?php echo $mmipDeleteOnDeactivation; ?>">
          <span class="mmip_setting_slider round"></span>
        </label>
      </div>

  </div>

  <div class="mmip_tab_content_action_btn">
    <button type="submit" name="rc_maint_mode_submit" id="saveGeneralSettings">
      Save General Settings
    </button>
  </div>
</form>
  