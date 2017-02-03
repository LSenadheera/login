<?php


if (isset($_POST["username"])) {
    $user = $_POST["username"];
    include ('database.php');
    $query1 = mysqli_query($connection, "SELECT * FROM login WHERE unamedb='$user' ");
    $row = mysqli_fetch_assoc($query1);
    $exist_name = $row['unamedb'];
    if ($exist_name != '') {
        echo "1";
    }
}
