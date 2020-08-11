<?php

// ------------------------------------------------------------------------------
//  © Copyright (с) 2020
//  Author: Dmitri Agababaev, d.agababaev@duncat.net
//
//  Redistributions and use of source code, with or without modification, are
//  permitted that retain the above copyright notice
//
//  License: MIT
// ------------------------------------------------------------------------------

session_start();

include_once('config.php');

if (isset($_GET['access_token'])) {
  $access_token = $_GET['access_token'];
  $resp = file_get_contents(SSO_HOST.'/webman/sso/SSOAccessToken.cgi?action=exchange&access_token='.$access_token.'&app_id='.APP_ID);
  $json_resp = json_decode($resp, true);

  if($json_resp['success'] == true){
    $_SESSION['user_id'] = $json_resp["data"]["user_id"];
    header('location: '.LOCAL_HOST.'/my/');
  }
  exit();
}

?>

<html>
<body>
  <script>
    var get = window.location.hash.substr(1);
    if (get) {
      window.location.href = "<?=REDIRECT_URI?>?" + get;
    }
  </script>
</body>
</html>
