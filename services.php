<?php
include("db_connection.php");
include("common.php");
$objCommon = new Common();
if(isset($_REQUEST['action']) && !empty($_REQUEST['action']))
{

    $rs = array();

    $method = $_REQUEST['action'];
    $result = $objCommon->$method($_REQUEST);

    $rs["data"] = $result;
    echo  json_encode($rs);
}