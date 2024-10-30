<?php
$rc_mmip_options = get_option('rc_mmip_settings');

$socialSet = $rc_mmip_options['socialSettings'];

$facebookHandler = $socialSet['facebook'];
$twitterHandler = $socialSet['twitter'];
$instagramHandler = $socialSet['instagram'];
$linkedinHandler = $socialSet['linkedin'];
$pinterestHandler = $socialSet['pinterest'];
$redditHandler = $socialSet['reddit'];

?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style>
  .mmip_tab_content_form_field label{
    width:100px !important;
  }
</style>
<form name="rc_maint_mode_form" id="rc_maint_mode_form" method="post" action=""> 
  
  <input type="hidden" name="tab" value="social">
  
  <div class="mmip_tab_content_title">
    Social Profiles
  </div>
  
  <div class="mmip_tab_content_main">
    
    <div class="mmip_tab_content_form_field">
      <p>
        To show the social profile icon, please provide your social profile username. 
        
        If no username is provided, the social profile icon will <b><u>NOT</u></b> appear.
      </p>
    </div>
    
    <div class="mmip_tab_content_form_field"> 
      <label><i class="fab fa-facebook-square"></i> Facebook</label>
      https://facebook.com/<input type="text" name="rc_mmip_fb" value="<?php echo $facebookHandler; ?>">  
    </div>
    
    <div class="mmip_tab_content_form_field"> 
      <label><i class="fab fa-twitter-square" aria-hidden="true"></i> Twitter</label>
      https://twitter.com/ <input type="text" name="rc_mmip_tw" value="<?php echo $twitterHandler; ?>">
    </div>
    
    <div class="mmip_tab_content_form_field"> 
      <label><i class="fab fa-instagram" aria-hidden="true"></i> Instagram</label>
      https://instagram.com/<input type="text" name="rc_mmip_instagram" value="<?php echo $instagramHandler; ?>">  
    </div>
    
    <div class="mmip_tab_content_form_field"> 
      <label><i class="fab fa-linkedin"></i> Linkedin</label>
      https://www.linkedin.com/in/<input type="text" name="rc_mmip_linkedin" value="<?php echo $linkedinHandler; ?>">  
    </div>
    
    <div class="mmip_tab_content_form_field"> 
      <label><i class="fab fa-pinterest-square" aria-hidden="true"></i> Pinterest</label>
      https://www.pinterest.com/<input type="text" name="rc_mmip_pinterest" value="<?php echo $pinterestHandler; ?>">  
    </div>
    
    <div class="mmip_tab_content_form_field"> 
      <label><i class="fab fa-reddit-square" aria-hidden="true"></i> Reddit</label>
      https://www.reddit.com/user/<input type="text" name="rc_mmip_reddit" value="<?php echo $redditHandler; ?>">  
    </div>
  </div>
  
  <div class="mmip_tab_content_action_btn">
    <button type="submit" name="rc_maint_mode_submit">
      Save Social Profiles
    </button>
  </div>
</form>