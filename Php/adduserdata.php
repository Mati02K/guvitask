<?php
include_once("conn.php");
include_once("Validate.php");
$validate = new Validate();

if(isset($_POST['name']) &&
isset($_POST['cno']) &&
isset($_POST['mail']) &&
isset($_POST['dob']) &&
isset($_POST['uname']) &&
isset($_POST['upass']) &&
isset($_POST['addr']) 
)
{
    $name =  $validate->sanitizeInput($conn,$_POST['name']);
    $cno =  $validate->sanitizeInput($conn,$_POST['cno']);
    $mail =  $validate->sanitizeInput($conn,$_POST['mail']);
    $dob =  $validate->sanitizeInput($conn,$_POST['dob']);
    $uname =  $validate->sanitizeInput($conn,$_POST['uname']);
    $upass =  $validate->sanitizeInput($conn,$_POST['upass']);
    $addr =  $validate->sanitizeInput($conn,$_POST['addr']);

    $namecheck =  $validate->stringValidate($name,2,30);
    $cnocheck =  $validate->stringValidate($cno,10,10);
    $unamecheck =  $validate->stringValidate($uname,2,10);
    $upasscheck =  $validate->stringValidate($upass,8,16);
    $addrcheck =  $validate->stringValidate($addr,10,200);
    $emailcheck =  $validate->emailCheck($mail);



    if($namecheck && $cnocheck && $unamecheck && $upasscheck && $addrcheck && $emailcheck)
    {

        $upass = base64_encode($upass);

        $stmt = $conn->prepare("INSERT INTO user_details (u_name, u_cno, u_email, u_dob, u_addr, username, userpass) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $cno, $mail, $dob, $addr, $uname, $upass);


        if($stmt->execute()) 
        {
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
    echo "<script>location.replace('http://localhost/guvi/Html/403.html')</script>;";
}
?>