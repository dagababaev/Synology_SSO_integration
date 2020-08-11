<?php

session_start();

include_once('config.php');

if (!isset($_SESSION['user_id'])) {
  header('location: '.SSO_HOST.'/webman/sso/SSOOauth.cgi?app_id='.APP_ID.'&scope=user_id&redirect_uri='.REDIRECT_URI);
}

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
  unset($_SESSION['user_id']);
  header('location: '.LOCAL_HOST);
}

// here we can do something after login
echo 'User ID:'.$_SESSION['user_id'].' logged in';

?>
