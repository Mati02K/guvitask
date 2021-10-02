<?php
session_start();
include_once("conn.php");
include_once("Validate.php");
$validate = new Validate();

if(isset($_POST['phone']) &&
isset($_POST['addr'])  && 
isset($_SESSION['u_name'])
)
{
    $phone =  $validate->sanitizeInput($conn,$_POST['phone']);
    $addr =  $validate->sanitizeInput($conn,$_POST['addr']);

    $phonecheck =  $validate->stringValidate($phone,10,10);
    $addrcheck =  $validate->stringValidate($addr,10,200);

    $u_name = $_SESSION['u_name'];

    if($phonecheck && $addrcheck)
    {
        // Update
        $stmt = $conn->prepare("UPDATE user_details SET u_cno  = ?, u_addr = ? WHERE username = ?");
        $stmt->bind_param('sss',$phone,$addr,$u_name);
        if($stmt->execute())
        {
            echo "1";
        }
        else
        {
            echo "0";
            session_unset(); 
            session_destroy();
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
    echo "Invalid Request";
    echo "<script>location.replace('http://localhost/guvi/Html/403.html')</script>;";
}
?>