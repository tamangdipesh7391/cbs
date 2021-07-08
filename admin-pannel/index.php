<?php
ob_start();
session_start();
require_once ("config/config.php");

if(!isset($_SESSION['is_auth_admin']) && $_SESSION['is_auth_admin'] != 'true')
{
 echo "<script> window.location.href='".base_url('login.php')."'</script>";

}
require_once ("config/db.php");



$url=isset($_GET['url']) ? $_GET['url'] :'home';

$url=str_replace('.php', '', $url);

$url.='.php';

$pagePath=root('pages/'.$url);

require_once root('includes/header.php');
 
require_once root('includes/sidebar.php');
if(file_exists($pagePath) && is_file($pagePath)){ 
	 

	require_once $pagePath;


}else {
	
	echo "<h1>Page not found 404</h1>";
}
require_once root('includes/footer.php');