<?php
/****************************************************************
 * insert new customer 
 * check if username is already exist in the db
 * check if two passwords are match
 ****************************************************************/

 //define to connect database 
define("IN_CODE",1);
include("dbconfig.php"); //database information 
include("functions.php"); //functions

//client's insert
$username = strtolower(mysqli_real_escape_string($con, $_POST['login_id']));
$password = mysqli_real_escape_string($con, $_POST['passwd1']);
$passwordConfirm = mysqli_real_escape_string($con, $_POST['passwd2']);
$fName = $_POST['first_name'];
$lName = $_POST['last_name'];
$tel = $_POST['tel'];
$address = $_POST['address'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$state = $_POST['state'];

$customer_query = "SELECT * from 2020F_kimeunb.CUSTOMER WHERE login_id = '$username';";
$result = mysqli_query($con, $customer_query);
$result_num = mysqli_num_rows($result);

//check if username is already exist
if($result_num > 0){
    echo "Error! There are same login ID. Please use other login ID";
}else if($password != $passwordConfirm){ //check is password is match
    echo "Two passwords are not match";
}else{ 
    //insert into db 
    $insert_query = "INSERT into 2020F_kimeunb.CUSTOMER 
                    VALUES(null, 
                    '$username', 
                    '$password', 
                    '$fName', 
                    '$lName', 
                    '$tel', 
                    '$address', 
                    '$city', 
                    '$zipcode', 
                    '$state');";
    $insert_result = mysqli_query($con, $insert_query);
    
    //check if insert is success or not
    if($insert_result){
        echo "<script type='text/javascript'>
        alert('Success to sign up! now you can login as a customer!')
        window.location.replace('p1.html')
        </script>";
    }else{
        //insert error print
        echo mysql_error();
    }
}
?>