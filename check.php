<//?php
include('connection.php');
session_start();
$user_check=$_SESSION['username'];

$ses_sql = mysqli_query($db,"SELECT username, admin FROM users WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['username'];
if($row['admin']==1){
    $adminuser = true;
}

if(!isset($user_check))
{
//header("Location: index.php");
}
?>
<?php
            ini_set('session.coockie_httponly',true);
            $_SESSION['username'] = $username; // Initializing Session
            $_SESSION["userid"] = $row[0];//user id assigned to session global variable
            $_SESSION["timeout"] = time();//get session time: protects against session highjacking by logging off users or preventing users from access in time frame
            $_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];// session highjacking:on login, the
             

             if(isset($_SESSION['last_ip'])===false){
                $_SESSION['last_ip'] = $_SERVER ['REMOTE_ADDR'];
            }
            if ($_SESSION['last_ip']!==$_SERVER['REMOTE_ADDR'])
                session_unset();
                session_destroy();
                // Redirecting To Other Page
                header("location: photos.php");
                



?>
