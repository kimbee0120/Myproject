<?php
/*********************************************************************
 * Customer login 
 * This part checks if client's input value; username and password is 
 * correct or not. This program will check wrong password and wrong
 * username. After success to login, this program will set cookie and 
 * display client's IP address and if the client is logged in from Kean 
 * Uni. or not and client's name with their role. Also they are available 
 * logout 
 ***************************************************************************/


 //define to connect database 
 define("IN_CODE",1);
 include("dbconfig.php"); //database information 
 include("functions.php"); //functions


 //POST username and password from the client side
 if(isset($_COOKIE['customer'])){
    $data = json_decode($_COOKIE['customer'], true);
    $username = $data['username'];
    $password = $data['pwd'];
}else{
    $username = strtolower(mysqli_real_escape_string($con, $_POST['customer_username']));
    $password = mysqli_real_escape_string($con, $_POST['customer_password']);
}
 //select all info from db where username is inserted
 $login_query = "SELECT * FROM 2020F_kimeunb.CUSTOMER WHERE login_id='$username'";
 $result = mysqli_query($con, $login_query);
 //check if result return something
 $result_num = mysqli_num_rows($result);

 //check if username is in the database
 if($result_num == 0){
     echo "Login ID ".$username." does NOT exist!";
 }else{
     $row = mysqli_fetch_array($result);
     
     //check if password is correct
     if($row['password'] != $password)
     {
         echo "Customer ".$username." does exist but password isn't match!";
     }else{

         /*login success*/

         //set cookie
         $cookie_name = "customer";
         $cookie_value = array('username'=>$username, 'pwd'=>$password);
         setcookie($cookie_name, json_encode($cookie_value), time()+86400, "/");

         //Print name
         echo "Welcome customer: <b>".$row['first_name']." ".$row['last_name']."</b>\n<br>";

         //Print address
         echo $row['address'].", ".$row['city'].", ".$row['state']." ".$row['zipcode']."\n<br>";

         //get IP address
         $ip_address = getIP();
         echo "Your IP: ".$ip_address."\n<br>";

         //check if the user is from Kean University
         if(isFromKean($ip_address)){
             echo "You are from Kean University\n<br>";
         }else{
             echo "You are NOT from Kean University\n<br>";
         }

         //customer logout
         echo "<a href='logout.php?id=customer'> Customer logout </a><br>";
         //anchor to update page
         echo "<a href='UpdateCustomer.php'> Update my data </a><br><br><br>";
         //direct to main page
         echo "<a href='p1.html'> project home page </a><br>";


     }
 }


?>