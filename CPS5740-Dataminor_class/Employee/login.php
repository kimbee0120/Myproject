<?php
include("functions.php"); //functions

    //if Employee cookie is set, redirect to the result
    if(isEmployeeLogin()){
        header ('location: login_result.php');
    }else
    {
        echo"<HTML>
                <head>
                    <meta charset='utf-8'>
                    <title> Login </title>
                    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap' rel='stylesheet'>
                    <style type='text/css'>
                        body{
                            background-color: rgba(20, 0, 40, .2);
                        }
                
                        h2{
                            font-size: 35px;
                            text-align: center;
                            padding-top: 30px;
                            font-weight: bold;
                            font-family: 'Montserrat', sans-serif;
                            text-transform: uppercase;
                
                        }
                
                        form{
                            padding-left: 500px;
                            font-size: 25px;
                            font-family: 'Montserrat', sans-serif;
                        }
                
                    </style>
                
                </head>
                <body>
                    <h2> Employee Login </h2>
                
                    <br>
                    <br>
                    
                    <form action='login_result.php' method='POST'>
                    Login ID: <input type='text' size='20' name='username' required='required'>
                    <br>
                    Password: <input type='password' size='20' name='password' required='required'>
                    <input type= 'submit' value='Submit'>
                </form>
                </body>
                </HTML>";
    }
?>