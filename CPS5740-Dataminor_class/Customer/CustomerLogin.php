<?php

if(isset($_COOKIE['customer'])){
    header ('location: Customer_result.php');
}else{
        echo "<HTML>
                <body>
                    <h2> Employee Login </h2>

                    <br>
                    <br>
            
                    <form action='Customer_result.php' method='POST'>
                    Login ID: <input type='text' size='20' name='customer_username' required='required'>
                    <br>
                    Password: <input type='password' size='20' name='customer_password' required='required'>
                    <input type= 'submit' value='Submit'>
                    </form>
                </body>
            </HTML>";
}
?>