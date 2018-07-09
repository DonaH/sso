<?php
function login($username,$password,$remember=false)
{
  define(WP_ROOT, "..");
  $file = WP_ROOT . '/wp-load.php';
  include($file);
  $credentials = array(
    'user_login' => $username,
    'user_password' => $password,
    'remember' => $remember
  );
  $loginResult = wp_signon($credentials, false);
  if (is_wp_error($loginResult)) {
    echo "Invalid login details";
  } else {
    echo "User logged in".print_r($loginResult,true);
  }
}
if (isset($_REQUEST['username'])) {
  login($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['remember']);
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <meta name="description" content="SonoSim Single Sign On Login">
 <meta name="SonoSim" content="SonoSim&reg; Ultrasound Training">
 <!-- <link rel="icon" href="../../favicon.ico"> -->
 <title>SonoSim&reg; Training Dashboard Login</title>
 <!-- Bootstrap core CSS -->
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="css/signin.css" rel="stylesheet">
 <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <!-- <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> -->
 <!-- <div id="particles-js"> -->
  <div class="container-fluid">
   <div class="row">
     <!-- Dashboard Login Form -->
      <div class="panel_base" id="dashboard-login">
        <img id="logo-tag2" src="assets/sonosim_lg_logo_tag.png" srcset="assets/sonosim_lg_logo_tag.svg" alt="SonoSim Logo">
        <form class="form-signin panel" action="<?php echo $_SERVER['PHP_SELF']?>" type="POST">



         <h4 class="form-signin-heading">SonoSim Dashboard</h4>
         <img id="logo-blue" src="assets/sonosim_logo_blue.png"> <!-- Logo for mobile -->
         <label for="inputEmail" class="sr-only">Username or Email address</label>
         <input name="username" type="text" id="inputUsernameDB" class="form-control" placeholder="Username*" required autofocus>
         <label for="inputPasswordDB" class="sr-only">Password*</label>
         <input name="password" type="password" id="inputPasswordDB" class="form-control" placeholder="Password*" required>
         <p style="text-align:left">
          <span><input type="checkbox" value="remember-me" name="remember"> Remember me</span>
           <span style="float:right;" >
             <a style="color:#666666;" href="https://dev.sonosim.com/wp-content/sso/lostpw.php"<h5>Lost your password?</h5></a>
           </span>
         </p>
         <input type="submit"/>
         <a href="#" class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="tooltip" title="For Accessing Training Modules: Course Library | Performance Tracker | CaseBuilder">
           Log in
         </a>
         <br />
         <div class="seperator">
           <span style="font-size: 16px; color: #8ccedd; background-color: #377BB5; padding: 0 10px;">Or</span>
         </div>
         <!-- <a id="webstore" href="#" class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="tooltip" title="For Customers Who Purchased Personal Solutions">SonoSim Webstore</a> -->
         <div><br /><a id="webstore-login" href="#" type="submit" data-toggle="tooltip" title="For Customers Who Purchased Personal Solutions">SonoSim Webstore</a></div>
        </form>
      </div>
    <!-- </div> -->
   </div><!-- /row -->
   <div class="row">
     <!-- Webstore Login Form -->
      <div class="panel_base" id="webstore-login" style="display:none;">
        <img id="logo-tag2" src="assets/sonosim_lg_logo_tag.png" srcset="assets/sonosim_lg_logo_tag.svg" alt="SonoSim Logo">
        <form class="form-signin panel" id="login" name="form" action="<?php echo do_shortcode('[woocommerce_my_account]'); ?>/my-account/" method="post">
         <div><a id="dashboard" href="#" type="submit" data-toggle="tooltip" title="For Accessing Training Modules: Course Library | Performance Tracker | CaseBuilder">SonoSim Dashboard</a></div>
         <br />
         <div class="seperator">
           <span style="font-size: 16px; color: #8ccedd; background-color: #377BB5; padding: 0 10px;">Or</span>
         </div>
         <br /><h4 class="form-signin-heading">SonoSim Webstore</h4>
         <img id="logo-blue" src="assets/sonosim_logo_blue.png"> <!-- Logo for mobile -->
         <label for="username" class="sr-only">Username or email address</label>
         <input type="text" id="username" class="form-control" placeholder="Username*" placeholder="Username or Email*" required autofocus>
         <label for="password" class="sr-only">Password*</label>
         <input type="password" id="password" class="form-control" name="password" placeholder="Password*" required>
         <p style="text-align:left">
          <span><input type="checkbox" value="remember"> Remember me</span>
           <span style="float:right;" >
             <a style="color:#666666;" href="https://dev.sonosim.com/wp-content/sso/lostpw.php"<h5>Lost your password?</h5></a>
           </span>
         </p>
         <!-- <a href="#" class="btn btn-lg btn-primary btn-block" type="submit" data-toggle="tooltip" title="For Customers Who Purchased Personal Solutions">Log in</a> -->
         <!-- <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="" />
         <input type="hidden" name="_wp_http_referer" value="/my-account/" /> -->
         <input type="submit" class="btn btn-lg btn-primary btn-block" name="login" value="Log in" data-toggle="tooltip" title="For Customers Who Purchased Personal Solutions" />
        </form>
      </div>
    <!-- </div> -->
    <div class="clearboth"></div>
   </div><!-- /row -->
  </div><!-- /container -->
 <!-- </div><! /particles-js -->
  <!-- <script src="js/app.js"></script> -->
  <!-- <script src="js/particles.min.js"></script> -->
<script>
  $(document).ready(function(){
    $("#dashboard-login").fadeIn(3);
    $("#webstore-login").fadeOut(3);
    $('[data-toggle="tooltip"]').tooltip();
    $("#webstore").click(function(){
      $("#dashboard-login").fadeOut(540);
      $("#webstore-login").fadeIn(540);
      });
    $("#dashboard").click(function(){
      $("#webstore-login").fadeOut(540);
      $("#dashboard-login").fadeIn(540);
      });
  });
</script>
</body>
</html>
<?php }?>
