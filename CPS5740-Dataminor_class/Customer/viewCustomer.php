<?php
//db connection 
define("IN_CODE",1);
include("dbconfig.php");
include("functions.php"); //functions

if(!isEmployeeLogin()){
    echo "You have to login as a employee or manager to see the customers";
}else{
    echo "The following customers are in the database.";
    $query = "SELECT * from 2020F_kimeunb.CUSTOMER;";
    //execute defined query 
    $result = mysqli_query($con, $query);

    //Check if the query excuted successfully
    if($result)
    {
        //Check if the query contains any value. If it does, print the table
        if(mysqli_num_rows($result)>0)
        {
            echo "<table border=1>\n";
            
            //Run tableTop function to print 
            echo tableTop(array("ID", "Login", "Password","First Name", "Last Name","Telephone", "Address", "City", "Zipcode", "State"));

            while($row = mysqli_fetch_assoc($result))
            {
                //Run drawTable function to print the table each row
                echo drawTable($row);
            }
            echo "</table>";
        }
    }
}
?>