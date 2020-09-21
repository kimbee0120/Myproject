<?php
/************************************
 * update customer 
 ************************************/
//define to connect database 
define("IN_CODE",1);
include("dbconfig.php"); //database information 
include("functions.php"); //functions

$username = $_COOKIE['customer'];
$password = mysqli_real_escape_string($con, $_POST['password']);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tel = $_POST['TEL'];
$address = $_POST['address'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$state = $_POST['state'];

$query = "UPDATE 2020F_kimeunb.CUSTOMER 
        SET password = '$password', 
        first_name = '$fname',
        last_name = '$lname',
        TEL = '$tel',
        address = '$address',
        city = '$city',
        zipcode = '$zipcode',
        state = '$state'
        WHERE login_id = '$username';";

$insert_result = mysqli_query($con, $query);
//check if insert is success or not
if($insert_result){
    echo "<script type='text/javascript'>
    alert('Successfully update the customer profile!')
    </script>
    <a href='logout.php?id=customer'> Customer logout </a><br>
    <a href='p1.html'> Project home page </a><br>";
}else{
    //insert error print
    echo mysql_error();
}

?>