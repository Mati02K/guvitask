<?php
session_start();
include_once("conn.php");
include_once("Validate.php");
$validate = new Validate();

if(isset($_POST['uname']) &&
isset($_POST['upass'])  
)
{
    $uname =  $validate->sanitizeInput($conn,$_POST['uname']);
    $upass =  $validate->sanitizeInput($conn,$_POST['upass']);

    $unamecheck =  $validate->stringValidate($uname,2,10);
    $upasscheck =  $validate->stringValidate($upass,8,16);

    if($unamecheck && $upasscheck)
    {
    
    $upass = base64_encode($upass);
        
    $stmt = $conn->prepare("SELECT username,userpass FROM user_details WHERE `username`=? AND `userpass`=?");

    $stmt->bind_param('ss',$uname,$upass);

    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $runame = $row['username'];
    $rupass = $row['userpass'];

    if($runame == $uname && $rupass == $upass) 
    {
        $_SESSION['u_name'] = $runame;
        echo "1";
    }
    else
    {
        echo "0";  
    }

    $stmt->close();
    $conn->close();

    }
    else
    {
        echo "Please Fill the Form Properly";
    }

}
else
{
    echo "<script>location.replace('http://localhost/guvi/403.html')</script>;";
}
?>