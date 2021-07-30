<?php  

define('URL', str_replace('index.php', '', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once 'inc/inc.php';
require_once 'controllers/Router.php';

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


$_SESSION['home_url']    = URL;
$_SESSION['site_code']   = 'mk';

if (is_local_server()) {
    
    $_SESSION['home_url']  = "http://127.0.0.1/doulimmo/";

}

else {
    
    $_SESSION['mk_home_url']  = "https://doulimmo.com/";   
}


date_default_timezone_set('Africa/Algiers');


$router = new Router();
$router->routerReq();

