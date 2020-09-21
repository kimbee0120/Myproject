<?php
/******************************************************************
 * Display employees table from mySQL database 
 *****************************************************************/

    //define to connect database 
    define("IN_CODE",1);
    include("dbconfig.php");
    include("functions.php");
    
    echo "The following employee are in the database.";

    $query = "SELECT * from EMPLOYEE;";
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
            echo tableTop(array("ID", "Login", "Password", "Name", "Role"));

            while($row = mysqli_fetch_assoc($result))
            {
                //Run drawTable function to print the table each row
                echo drawTable($row);
            }
            echo "</table>";
            

        }
    }

?>