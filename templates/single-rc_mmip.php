<?php
/* Template Name: MMIP Plugin Default Page */ 
show_admin_bar(false);

$template_url =  plugin_dir_url( __FILE__ );
$blog_name = get_bloginfo( 'name', 'display' );

$rc_mmip_options = get_option('rc_mmip_settings');

$generalSettings = $rc_mmip_options['generalSettings'];
$designSettings = $rc_mmip_options['designSettings'];
$socialSettings = $rc_mmip_options['socialSettings'];
$mailChimpSettings = $rc_mmip_options['mailchimpSettings'];


$mmipMaintenanceSwitch = $generalSettings['rc_mmip_switch'];
$mmipAllowedIP = implode("\n", $generalSettings['rc_mmip_allowedip']);
$mmipWhereTo = $generalSettings['rc_mmip_whereto'];
$mmipGoToURL = $generalSettings['rc_mmip_url'];
$mmipToPage = $generalSettings['rc_mmip_topage'];
$mmipDeleteOnDeactivation = $generalSettings['rc_mmip_deleteondeact'];

$mmipDesignTitle = $designSettings['rc_mmip_inside_title'];
$mmipDesignShowCounter = $designSettings['rc_mmip_inside_ctopt'];
$mmipDesignCounterDate = $designSettings['rc_mmip_inside_date'];
$mmipDesignMsg = $designSettings['rc_mmip_inside_msg'];
$mmipDesignBGOpt = $designSettings['rc_mmip_inside_bgopt'];
$mmipDesignDefaultBG = $designSettings['rc_mmip_default_bg'];
$mmipDesignCustomBG = $designSettings['rc_mmip_inside_custom_img'];

$mmipMailChimpFormTitle = $mailChimpSettings['rc_mmip_mchimp_section_title'];
$mmipMailChimpShowForm = $mailChimpSettings['rc_mmip_mchimp_opt'];
$mmipMailChimpAPIKey = $mailChimpSettings['rc_mmip_mchimp_api'];
$mmipMailChimpList = $mailChimpSettings['rc_mmip_mchimp_list'];
$mmipMailChimpFormSuccessfulMsg = $mailChimpSettings['rc_mmip_mchimp_after_msg'];
$mmipGoogleCaptchaShow = $mailChimpSettings['rc_mmip_mchimp_gcaptcha'];
$mmipGoogleCaptchaSiteKey = $mailChimpSettings['rc_mmip_mchimp_gcaptcha_site'];

$facebookHandler = $socialSettings['facebook'];
$twitterHandler = $socialSettings['twitter'];
$instagramHandler = $socialSettings['instagram'];
$linkedinHandler = $socialSettings['linkedin'];
$pinterestHandler = $socialSettings['pinterest'];
$redditHandler = $socialSettings['reddit'];

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Maintenance Mode By IP - <?php echo esc_html($blog_name); ?>">
    <meta name="author" content="<?php echo esc_html($blog_name); ?>">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo esc_html($blog_name); ?></title>
    
    <?php wp_head();  ?>
    
    <?php if($mmipGoogleCaptchaShow == 1): ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $mmipGoogleCaptchaSiteKey; ?>"></script>
    <?php endif; ?>
    
    <link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'> 
    
	  <!--- need this to overwrite the styles of themes --->
	  <link href="<?php echo $template_url; ?>assets/css/soon.css" rel="stylesheet">
    
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $template_url; ?>assets/js/html5shiv.js"></script>
      <script src="<?php echo $template_url; ?>assets/js/respond.min.js"></script>
    <![endif]-->
    
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
		<style>
      
      html, body, .content{
          height: 100% !important;
      }
      .content{
          display: table;
          vertical-align: middle;
      }
      .vertical-center-row{
          display: table-cell;
          vertical-align: middle;
      }
      
      
			body{
				background: url(<?php if ( $mmipDesignBGOpt == 0){ echo esc_url($mmipDesignDefaultBG); }else{ echo esc_url($mmipDesignCustomBG); } ?>) #000000 no-repeat center center fixed !important; 
				background-size: cover;
				
				color: #ffffff !important;
        font-family: 'Raleway', sans-serif !important;
			}
			
      html{
        margin: 0 !important;
      }
      
			body:before{
				content: none !important;
			}
			
			body:after{
				content: none !important;
			}
						
			.message_text{
				margin-top: 30px;
				margin-bottom: 30px;
			}
			
			#layer{
				background-color: rgba(0, 0, 0, 0.44) !important;
			}
			
			h1{
				margin-top: 0 !important;
			}
      
      h1:before{
        content: none !important;
      }
      
      .mmip-social-profile li{
        display: inline-block;
        margin-right: 15px;
        font-size: 3em;
        color: #ffffff !important;
        list-style-type: none;
      }
      
      .mmip-social-profile li a{
        color: #ffffff !important;
        text-decoration: none;
        opacity: 0.5;
      }
      
      .mmip-social-profile li a:hover{
        opacity: 1;
      }
      
      .footer {
        font-size: 12px;
        text-align: center;
        padding: 20px 0;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
        background-color: rgba(0, 0, 0, 0.7490196078431373);
        z-index: 9999
      }
      
      #bitnami-banner{
        display: none !important;
      }
      
		</style>
		
		<script>
			jQuery(document).ready(function($){
        
        
				//Get data on click.
				$(".rc_submit_mailchimp").click(function(e){
					var $btn = $(this).button('loading');
					var email = $('.rc_maint_mc_email').val();
					
          if(email.length === 0){
						$(".thank_you_msg").css({"color": "#ffffff", "background-color": "rgba(240, 0, 0, 0.35)", "padding":"10px"}).html('<i class="fa fa-exclamation-triangle"></i> Please insert a valid email address.');
						$btn.button('reset');
						clearContainer();
						return false;
					}
          
					
					<?php if($mmipGoogleCaptchaShow == 1){ ?>
					  grecaptcha.ready(function() {
                // do request for recaptcha token
                // response is promise with passed token
                grecaptcha.execute('<?php echo $mmipGoogleCaptchaSiteKey; ?>', {action: 'createtoken'}).then(function(token) {
                    // add token to form
                    var data = {
                      'action': 'rc_maintv3_mchimp_action',
                      'email': email,
                      'token': token
                    };
                  
                    $.post(rcmmipAjaxurl,data, function(res){

                      $(".rc_maint_mc_email").val("");
//$(".thank_you_msg").html(res);
                      alert(res);
                      window.location.reload();

                    });
                });;
            });
					<?php }else{ ?>
          
            var data = {
              'action': 'rc_maint_mchimp_action',
              'email': email
            };

            $.post(rcmmipAjaxurl,data, function(res){

              $(".rc_maint_mc_email").val("");

              alert(res);
              window.location.reload();

            });
          
          
          <?php } ?>


				});
				
				function clearContainer(){
					setTimeout(function(){ 
						$(".thank_you_msg").css({"color": "#ffffff", "background-color": "transparent", "padding":"10px"}).html("");
					}, 5000);

				}
				
			});
			
			
		
		</script>
    
  </head>
  
	
  <body>
	<!-- LAYER OVER THE SLIDER TO MAKE THE WHITE TEXT READABLE -->
	<div id="layer"></div>
	<div class="container content" style="position: relative; z-index: 9999;">
    <div class="vertical-center-row">
      
    
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center header_text">
				 <h1 data-animated="bounceInLeft"><?php echo str_replace('%blog_name%', esc_html($blog_name), esc_html($mmipDesignTitle)); ?></h1>
			</div>
		</div>
      
    <?php if($mmipDesignMsg != ''): ?>
      <div class="row">
        <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 text-center message_text">
          <div id="message" data-animated="GoIn"><?php  echo html_entity_decode($mmipDesignMsg); ?></div>
        </div>
      </div>
    <?php endif; ?>
      
   <?php if($mmipDesignShowCounter != 0): ?>   
	 <div id="timer" data-animated="FadeIn">
			
				<div class="row countDownContainer">
					<div class="hidden-xs col-sm-12 col-md-12 col-lg-12 text-center">
						<div id="days" class="timer_box"></div>
						<div id="hours" class="timer_box"></div>
						<div id="minutes" class="timer_box"></div>
						<div id="seconds" class="timer_box"></div>
					</div>
					<div class="visible-xs-12 hidden-sm hidden-md hidden-lg text-center">
						
							<div class="col-xs-3 col-md-3 col-lg-3 text-right">
								<div id="m_days" class="time_container"></div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-3">
								<div id="m_hours" class="time_container"></div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-3">
								<div id="m_minutes" class="time_container"></div>
							</div>
							<div class="col-xs-3 col-md-3 col-lg-3 text-left">
								<div id="m_seconds" class="time_container"></div>
							</div>
						
					</div>
				</div>
			
		</div>
    <?php endif; ?>
      
		<?php if($mmipMailChimpShowForm == 1 && $mmipMailChimpAPIKey != ""):?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 mt text-center">
				
				<h3><?php echo esc_html($mmipMailChimpFormTitle); ?></h3>
				<div class="form-group">
					<label class="sr-only" for="chimpemailaddress">Email address</label>
					<input type="email" name="rc_maint_mailchimpsubscriberemail" class="form-control rc_maint_mc_email" id="chimpemailaddress" placeholder="Enter email address">
				</div>
				<button type="submit" name="rc_maint_mailchimpsubscriber" class="btn btn-info rc_submit_mailchimp" autocomplete="off" style="margin-top: 10px;">Submit</button>
				<div class="thank_you_msg" style="margin-top: 20px;"></div>
			</div>
		</div>
		<?php endif; ?>
    
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        
        <?php if($facebookHandler !== "" || $twitterHandler !== "" || $instagramHandler !== "" || $linkedinHandler !== "" || $pinterestHandler !== "" ||$redditHandler !== "") { ?>
        <h4>
					Follow us on 
				</h4>
        <?php } ?>
        
        <ul class="mmip-social-profile">
          <?php if($facebookHandler !== "") { ?>
            <li><a href="https://facebook.com/<?php echo $facebookHandler; ?>"><i class="fa fa-facebook-square"></i></a></li>
          <?php } ?>
          <?php if($twitterHandler !== "") { ?>
            <li><a href="https://twitter.com/<?php echo $twitterHandler; ?>"><i class="fa fa-twitter-square"></i></a></li>
          <?php } ?>
          <?php if($instagramHandler !== "") { ?>
            <li><a href="https://instagram.com/<?php echo $instagramHandler; ?>"><i class="fa fa-instagram"></i></a></li>
          <?php } ?>
          <?php if($linkedinHandler !== "") { ?>
            <li><a href="https://www.linkedin.com/in/<?php echo $linkedinHandler; ?>"><i class="fa fa-linkedin"></i></a></li>
          <?php } ?>
          <?php if($pinterestHandler !== "") { ?>
            <li><a href="https://www.pinterest.com/<?php echo $pinterestHandler; ?>"><i class="fa fa-pinterest-square"></i></a></li>
          <?php } ?>
          <?php if($redditHandler !== "") { ?>
            <li><a href="https://www.reddit.com/user/<?php echo $redditHandler; ?>"><i class="fa fa-reddit-square"></i></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
      </div>
	</div>
	<!-- end container -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <p class="text-muted">
              &copy; <?php echo date('Y') . ' ' . esc_html($blog_name); ?> | <a href="https://wordpress.org/plugins/maintenance-mode-by-ip-address/" rel="nofollow">Powered by Maintenance By IP Plugin</a>
            </p>    
          </div>
        </div>
        
      </div>
    </footer>
    <?php $directoryURL =  plugin_dir_url( __FILE__ ); ?>
    <script src="<?php echo $directoryURL; ?>assets/js/modernizr.custom.js"></script>
    <script src="<?php echo $directoryURL; ?>assets/js/flowtype.js"></script>
    <script src="<?php echo $directoryURL; ?>assets/js/soon/plugins.js"></script>
    <script src="<?php echo $directoryURL; ?>assets/js/soon/custom.js"></script>
    
  </body>
  <!-- END BODY -->
</html>
<?php wp_footer(); ?>