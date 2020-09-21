<?php
/*********************************************************************
 * update customer account
 ********************************************************************/
 //define to connect database 
 define("IN_CODE",1);
 include("dbconfig.php"); //database information 
 include("functions.php"); //functions

if(isset($_COOKIE['customer']))
{

    //customer logout
    echo "<a href='logout.php?id=customer'> Customer logout </a><br><br><br>";
    $data = json_decode($_COOKIE['customer'], true);
    $username = $data['username'];
    $query = "SELECT * FROM 2020F_kimeunb.CUSTOMER WHERE login_id = '$username';";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    echo "<table border=1>\n";
    echo "<form action='update.php' method='POST'>\n";
    //Run tableTop function to print 
    echo tableTop(array("Customer ID", "login ID", "Password","First Name", "Last Name","Telephone", "Address", "City", "Zipcode", "State"));

    //print update table
    echo getupdatetable($row)."</table>";

    //submit
    echo "<input type='submit' value='Update information'></form><br>";
    
    //customer's home page
    echo "<a href='Customer_result.php'> Customer's home page </a><br>";
    //project home page
    echo "<a href='p1.html'> Project home page </a><br>";
 
}else{
    echo "login into Customer account";
}
?>