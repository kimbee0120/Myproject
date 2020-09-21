<?php
//check query size
function tableTop($arr)
{
    $str="<tr>";
    foreach($arr as $element)
    {
        $str.= "<td>".$element."</td>";
    }
    $str.="</tr>";

    return $str;
}

//draw table function
function drawTable($arr){
    $str="<tr>";
    foreach($arr as $element)
    {
        $str.= "<td>".$element."</td>";
    }
    $str.="</tr>\n";

    return $str;

}

//return IP address
function getIP(){
    $ip = "";

    //define ip
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){ 
	    $ip = $_SERVER['HTTP_CLIENT_IP']; 
	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
    }else{ 
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

//check if location is at Kean or not
function isFromKean($ip){

    $ip_sub = explode(".",$ip);

    if($ip_sub[0]=="10" || ($ip_sub[0]=="131" && $ip_sub[1]=="125")){
        return true;
    }else{
        return false;
    }
}

//return full position
function position($c){
    if($c == "M"){
        return "manager";
    }else{
        return "employee";
    }
}

//check if employee logged in
function isEmployeeLogin(){
    if(isset($_COOKIE['manager']) || isset($_COOKIE['employee'])){
        return true;
    }else{
        return false;
    }
}

//get cookie name
function cookieName(){
    if(isset($_COOKIE['manager'])){
        return "manager";
    }else if(isset($_COOKIE['employee'])){
        return "employee";
    }else{
        return "customer";
    }
}

//print update table
function getupdatetable($row){
    return"
    <tr><td bgcolor=yellow>$row[0]</td>
        <td bgcolor=yellow>$row[1]</td>
        <td><input type='text' size=8 name='password' value='$row[2]'></td>
        <td><input type='text' size=8 name='fname' value='$row[3]'></td>
        <td><input type='text' size=8 name='lname' value='$row[4]'></td>
        <td><input type='text' size=8 name='TEL' value='$row[5]'></td>
        <td><input type='text' size=8 name='address' value='$row[6]'></td>
        <td><input type='text' size=8 name='city' value='$row[7]'></td>
        <td><input type='text' size=8 name='zipcode' value='$row[8]'></td>
        <td><select name='state'><OPTION value='AL'>Alabama</OPTION>
        <OPTION value='AK'>Alaska</OPTION>
        <OPTION value='AZ'>Arizona</OPTION>
        <OPTION value='AR'>Arkansas</OPTION>
        <OPTION value='CA'>California</OPTION>
        <OPTION value='CO'>Colorado</OPTION>
        <OPTION value='CT'>Connecticut</OPTION>
        <OPTION value='DE'>Delaware</OPTION>
        <OPTION value='FL'>Florida</OPTION>
        <OPTION value='GA'>Georgia</OPTION>
        <OPTION value='HI'>Hawaii</OPTION>
        <OPTION value='ID'>Idaho</OPTION>
        <OPTION value='IL'>Illinois</OPTION>
        <OPTION value='IN'>Indiana</OPTION>
        <OPTION value='IA'>Iowa</OPTION>
        <OPTION value='KS'>Kansas</OPTION>
        <OPTION value='KY'>Kentucky</OPTION>
        <OPTION value='LA'>Louisiana</OPTION>
        <OPTION value='ME'>Maine</OPTION>
        <OPTION value='MD'>Maryland</OPTION>
        <OPTION value='MA'>Massachusetts</OPTION>
        <OPTION value='MI'>Michigan</OPTION>
        <OPTION value='MN'>Minnesota</OPTION>
        <OPTION value='MS'>Mississippi</OPTION>
        <OPTION value='MO'>Missouri</OPTION>
        <OPTION value='MT'>Montana</OPTION>
        <OPTION value='NE'>Nebraska</OPTION>
        <OPTION value='NV'>Nevada</OPTION>
        <OPTION value='NH'>New Hampshire</OPTION>
        <OPTION value='NJ' selected>New Jersey</OPTION>
        <OPTION value='NM'>New Mexico</OPTION>
        <OPTION value='NY'>New York</OPTION>
        <OPTION value='NC'>North Carolina</OPTION>
        <OPTION value='ND'>North Dakota</OPTION>
        <OPTION value='OH'>Ohio</OPTION>
        <OPTION value='OK'>Oklahoma</OPTION>
        <OPTION value='OR'>Oregon</OPTION>
        <OPTION value='PA'>Pennsylvania</OPTION>
        <OPTION value='RI'>Rhode Island</OPTION>
        <OPTION value='SC'>South Carolina</OPTION>
        <OPTION value='SD'>South Dakota</OPTION>
        <OPTION value='TN'>Tennessee</OPTION>
        <OPTION value='TX'>Texas</OPTION>
        <OPTION value='UT'>Utah</OPTION>
        <OPTION value='VT'>Vermont</OPTION>
        <OPTION value='VA'>Virginia</OPTION>
        <OPTION value='WA'>Washington</OPTION>
        <OPTION value='WV'>West Virginia</OPTION>
        <OPTION value='WI'>Wisconsin</OPTION>
        <OPTION value='WY'>Wyoming</OPTION>
        </select></td></tr>
    ";
}


?>