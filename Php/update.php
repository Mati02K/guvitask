<?php
include_once("conn.php");
include_once("Validate.php");
require './vendor/autoload.php';

$validate = new Validate();

if(isset($_POST['phone']) &&
isset($_POST['addr'])  && 
isset($_POST['uname'])
)
{
    $phone =  $validate->sanitizeInput($conn,$_POST['phone']);
    $addr =  $validate->sanitizeInput($conn,$_POST['addr']);

    $phonecheck =  $validate->stringValidate($phone,10,10);
    $addrcheck =  $validate->stringValidate($addr,10,200);

    $u_name = $_POST['uname'];

    if($phonecheck && $addrcheck)
    {
        // Update
        $stmt = $conn->prepare("UPDATE user_details SET u_cno  = ?, u_addr = ? WHERE username = ?");
        $stmt->bind_param('sss',$phone,$addr,$u_name);
        if($stmt->execute())
        {
            $redis = new Predis\Client();
            $redis->set("cno",$phone);
            $redis->set("addr",$addr);
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
    echo "Invalid Request";
    echo "<script>location.replace('../Html/403.html')</script>;";
}
?>