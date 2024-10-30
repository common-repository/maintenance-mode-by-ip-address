<?php
$arg = $_GET["tab"];

if($arg == "design"){
  $activeGeneral = "";
  $activeDesign = "active_tab";
  $activeSocial = "";
  $activeMailchimp = "";
}else if($arg == "social"){
  $activeGeneral = "";
  $activeDesign = "";
  $activeSocial = "active_tab";
  $activeMailchimp = "";
}else if($arg == "mchimp"){
  $activeGeneral = "";
  $activeDesign = "";
  $activeSocial = "";
  $activeMailchimp = "active_tab";
}else{
  $activeGeneral = "active_tab";
  $activeDesign = "";
  $activeSocial = "";
  $activeMailchimp = "";
}

 
?>

    <link href="<?php echo $directoryURL; ?>templates/assets/css/jquery.datetimepicker.css" rel="stylesheet">
<style>
    #wpcontent{
    margin-left: 140px !important;
  }
</style>

<div class="mmip_container_fluid">
  <div class="mmip_row">
    <div class="mmip_col mmip_heading">
      Maintenance/Coming Soon Mode by IP Address
    </div>
  </div>
</div>

<div class="mmip_container">
  <div class="mmip_row">
    
    <div class="mmip_col">
 
          <?php if ($proxy1 !== null || $proxy2 !== null) { ?> 
          
          <div class="mmip_alert mmip_alert_error">
            It looks like you <em>may</em> be behind a proxy. <b>Proxy IP</b>: 
          
            <?php if ($proxy1 !== null) { 
                    echo $proxy1;
                  }else { 
                    echo $proxy2;   
                  }
             ?>
              - Never use a proxy IP Address!
          </div>
            <?php
              }
          ?> 
        <p>
          Current <b>PUBLIC IP</b> Address:  <?php  echo $currentIP;  ?> - <a href="https://www.google.com/search?q=whats+my+ip" target="_blank">Click here to validate it!</a>
        </p>
    </div>
    
    <div class="mmip_col">
      <hr>
      
      
      <div class="mmip_navbar">
        <ul>
          <li><a href="<?php echo $urlGeneral; ?>" class="<?php echo $activeGeneral; ?>">General</a></li>
          <li><a href="<?php echo $urlDesign; ?>" class="<?php echo $activeDesign; ?>">Design</a></li>
          <li><a href="<?php echo $urlSocial; ?>" class="<?php echo $activeSocial; ?>">Social</a></li>
          <li><a href="<?php echo $urlMailchimp; ?>" class="<?php echo $activeMailchimp; ?>">MailChimp</a></li>
        </ul>
      </div>
      
    </div>
    
  </div><!-- end of mmip_row -->
  
  <div class="mmip_row">
    <div class="mmip_col mmip_tab_content">
      <?php
        
        
        if($arg == "design"){
          include_once('settings/design.php');
        }else if($arg == "social"){
          include_once('settings/social.php');
        }else if($arg == "mchimp"){
          include_once('settings/mailchimp.php');
        }else{
          include_once('settings/general.php');
        }
        
      ?>
    </div>
  </div><!-- end of mmip_row -->
</div><!-- end of mmip_container --> 

    <script src="<?php echo $directoryURL; ?>admin/js/rc_maint_backend.js"></script>
    <script src="<?php echo $directoryURL; ?>templates/assets/js/jquery.datetimepicker.js"></script>  
