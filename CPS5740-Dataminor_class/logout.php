<?php
//delete cookie
$cookie_name = $_GET['id'];
if (isset($_COOKIE[$cookie_name])) {

    unset($_COOKIE[$cookie_name]);

    setcookie($cookie_name, '', time() - 86400, '/'); 
}

echo "<script type='text/javascript'>
alert('Success to logout! redirect to main page')
window.location.replace('p1.html')
</script>";
exit();
?>