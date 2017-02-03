/**
 * Created by Lahiru Senadheera on 2/3/2017.
 */

function pwValidate() {
    var pwd = document.getElementById("password").value;
    var cnfrmpwd = document.getElementById("confirm_password").value;
    if (pwd != cnfrmpwd){
        document.getElementById("confirm_divpassword").className = "inner-addon left-addon has-warning";
        document.getElementById("confirm_ipwd").className = "glyphicon glyphicon-lock reddiv";
        alert("Password do not match");
    }
    else {
        document.getElementById("confirm_divpassword").className = "inner-addon left-addon has-success";
        document.getElementById("confirm_ipwd").className = "glyphicon glyphicon-lock greendiv";
//                alert("success");
    }

}

function confirm_blank() {
    var lengpw = document.getElementById("password").value;
    if(lengpw.length<5){
        alert("Password should have minimum 5 characters");
        document.getElementById("divpassword").className = "inner-addon left-addon has-warning";
        document.getElementById("ipwd").className = "glyphicon glyphicon-lock reddiv";
        var xx = document.getElementById("password");
        xx.focus();
    }
    else {
        document.getElementById("divpassword").className = "inner-addon left-addon has-success";
        document.getElementById("ipwd").className = "glyphicon glyphicon-lock greendiv";
//                alert("success");
    }
    document.getElementById("confirm_password").value="";

}
