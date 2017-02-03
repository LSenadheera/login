<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Senadheera
 * Date: 2/3/2017
 * Time: 9:59 PM
 */

$host="localhost";
$sql_username="root";
$sql_password="";
$dbname="roni";
$dbtable="login";

$connection = mysqli_connect($host, $sql_username, $sql_password, $dbname);
mysqli_select_db($connection, $dbtable);
