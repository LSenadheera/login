<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>

</head>


<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrapValidator.min.css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrapValidator.min.js"></script>
<script src="js/jquery.validate.min.js"></script>

<style>
    .help-block {
        margin-top: 0px;
    }

    .form-group {
        margin-bottom: 6px;
        margin-top: -3px;
    }

    .greendiv {
        color: darkgreen;
    }

    .signup {
        margin-bottom: -15px;

    }

    body {
        background-color: #f9f9f9;
    }

    .inner-addon {
        position: relative;
    }

    /* style icon */
    .inner-addon .glyphicon {
        position: absolute;
        padding: 10px;
        pointer-events: none;

    }

    /* align icon */
    .left-addon .glyphicon {
        left: 0px;
    }

    .right-addon .glyphicon {
        right: 0px;
    }

    /* add padding  */
    .left-addon input {
        padding-left: 30px;
    }

    .right-addon input {
        padding-right: 30px;
    }

</style>
<body>
<div style="height: 100px">

</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-2 col-xs-12 col-lg-3">

        </div>
        <div class="col-md-4 col-sm-8 col-lg-6">
            <div class=" col-sm-2 col-lg-3 ">
            </div>
            <div class="col-md-12    col-sm-8  col-lg-6 form-group" align="center">
                <div class="panel panel-default">
                    <div class="panel-heading">Sign up</div>
                    <div class="panel-body">
                        <form method="POST" action="signup.php" id="signupform">

                            <div class="inner-addon left-addon form-group ">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <input id="fname" class="signup form-control" type="text" name="firstname"
                                       placeholder="First Name" pattern="[A-Za-z]{1,20}"><br>
                            </div>

                            <div class="inner-addon left-addon form-group">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <input class="signup form-control" type="text" name="lastname" placeholder="Last Name"
                                       pattern="[A-Za-z]{1,20}"><br>
                            </div>
                            <div class="inner-addon left-addon form-group">
                                <i class="glyphicon glyphicon-user"></i>
                                <input class="signup form-control" type="text" name="username" placeholder="User Name"
                                       id="uname"><br>
                            </div>
                            <div class="inner-addon left-addon form-group">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <input class="signup form-control" type="email" name="email" placeholder="Email"><br>
                            </div>
                            <div class="inner-addon left-addon form-group" id="divpassword" name="passwordN">
                                <i class="glyphicon glyphicon-lock " id="ipwd"></i>
                                <input class="signup form-control" type="password" id="password" name="pwd"
                                       placeholder="Password"> <br>
                            </div>
                            <div class="inner-addon left-addon form-group" id="confirm_divpassword" name="cnfrmpawsd">
                                <i class="glyphicon glyphicon-lock" id="confirm_ipwd"></i>
                                <input class="signup form-control" type="password" id="confirm_password" name="cnfrmpwd"
                                       placeholder="Confirm Password"><br>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Sign Up"></input>
                            <br><br>
                            <div id="confirm" hidden class="alert alert-danger">User name already exists !</div>

                            <?php

                            $fname = "";
                            $lname = "";
                            $username = "";
                            $email = "";
                            $password = "";
                            $check = "";
                            if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['cnfrmpwd'])) {
                                $fname = $_POST['firstname'];
                                $lname = $_POST['lastname'];
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $password = md5($_POST['cnfrmpwd']);
                            }

                            if ($fname != '' && $lname != '' && $username != '' && $email != '' && $password != '') {
                                include ('database.php');
                                $query = mysqli_query($connection, "SELECT * FROM login WHERE unamedb='$username'");
                                $row = mysqli_fetch_assoc($query);
                                $validuname = $row['unamedb'];

                                if ($validuname != '') {
                                    $check = 1;
                                } else {
                                    $connection = mysqli_connect("localhost", "root", "", "roni");
                                    mysqli_select_db($connection, "login");
                                    mysqli_query($connection, "INSERT INTO login VALUES ('$fname','$lname','$username','$email','$password')");
                                    echo "<script type='text/javascript'>", "function_success();", "</script>";
                                }
                            }

                            ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


</body>


<script type="text/javascript">


    $("#uname").change(function () {
        var usernamecheck = $("#uname").val();
        $.post("username_check.php", {username: usernamecheck}, function (data) {

            if (data == 1) {
                $('#confirm').show(300).delay(2000).hide(500);
            }
        });

    });


    $(document).ready(function () {
        var submit_user_name = "<?php echo $check ?>";
        if (submit_user_name == 1) {

            $('#confirm').show(300).delay(2000).hide(500, function () {
                window.history.back();

            });


        }
        ;


        var validator = $("#signupform").bootstrapValidator({


            fields: {
                firstname: {
                    message: "First name is required ",
                    validators: {
                        notEmpty: {}
                    }

                },
                lastname: {

                    validators: {
                        notEmpty: {
                            message: "Last name is required",
                        }
                    }
                },
                pwd: {
                    message: "Password is required",
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 5,
                            message: "Password must be at least 5 characters"
                        }
                    }
                },
                username: {
                    message: "User name is required",
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            max: 8,
                            message: "User name should not exceed 8 characters"
                        }
                    }
                },
                email: {
                    message: "Email is required",
                    validators: {
                        notEmpty: {},
                        emailAddress: {
                            message: "Enter valid email address"
                        }
                    }
                },
                cnfrmpwd: {
                    message: "Enter your password again",
                    validators: {
                        notEmpty: {},
                        identical: {
                            field: "pwd",
                            message: "Passwords do not match"
                        }
                    }
                }
            },


        });


    });


</script>

</html>

