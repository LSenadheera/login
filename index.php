<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<?php

$connection = mysqli_connect("localhost","root","","roni");
if (mysqli_connect_errno()){
    echo "error";
}


$sql="SELECT * from login";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);
echo $row["usernamedb"];
echo "<br>".$row["pwddb"];


?>
<body>
<div style="height: 300px"></div>
<div align="center">
    <form>
        <input type="text" name="username" required placeholder="User Name"><br><br>
        <input type="password" name="pwd" required placeholder="Password"><br><br>
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>