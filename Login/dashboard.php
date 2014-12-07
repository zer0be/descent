<?php
require_once('../Connections/dbDescent.php');

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

include '../includes/function_logout.php';
include '../includes/function_getSQLValueString.php';


include 'mycampaigns.php'
?>