<?php ob_start(); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  @session_start();
  @session_destroy();
}
// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['name'] = NULL;
  $_SESSION['surname'] = NULL;
  //$_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_name']);
  unset($_SESSION['MM_surname']);
  //unset($_SESSION['PrevUrl']);
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    $logoutGoTo = "index.php";
    exit;
  }
}
?>