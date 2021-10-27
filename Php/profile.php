<?php
include_once('conn.php');

require './vendor/autoload.php';
$redis = new Predis\Client();

if(isset($_POST['token']) && $redis->exists("token") == 1)
{
    $user_id = $redis->get("userid");
    $name = $redis->get("name");
    $u_email = $redis->get("email");
    $u_cno = $redis->get("cno");
    $u_dob = $redis->get("dob");
    $u_addr = $redis->get("addr");
    $runame = $redis->get("uname");

    $userdetails = array(
        'status' => '1',
        'userid' => $user_id,
        'name' => $name,
        'email' => $u_email,
        'cno' => $u_cno,
        'dob' => $u_dob,
        'addr' => $u_addr,
        'uname' => $runame
    
    );
    echo json_encode($userdetails);
}

// Only if the Key is not present in Redis we are loading from MYSQL
else if(isset($_POST['token']))
{
$token = $_POST['token'];
$stmt = $conn->prepare("SELECT * FROM user_details WHERE u_token = (?)");
$stmt->bind_param('s',$token);
$stmt->execute();

$result = $stmt->get_result();

if($result)
{
$row = $result->fetch_array(MYSQLI_ASSOC);

$user_id = $row['user_id'];
$name = $row['u_name'];
$u_email = $row['u_email'];
$u_cno = $row['u_cno'];
$u_dob = $row['u_dob'];
$u_addr = $row['u_addr'];
$runame = $row['username'];



// Setting the Data to the redis
$redis->set("userid",$user_id);
$redis->set("name",$name);
$redis->set("email",$u_email);
$redis->set("cno",$u_cno);
$redis->set("dob",$u_dob);
$redis->set("addr",$u_addr);
$redis->set("uname",$runame);
$redis->set("token",$token);

$userdetails = array(
    'status' => '1',
    'userid' => $user_id,
    'name' => $name,
    'email' => $u_email,
    'cno' => $u_cno,
    'dob' => $u_dob,
    'addr' => $u_addr,
    'uname' => $runame

);
echo json_encode($userdetails);

}
else
{
    $userdetails = array(
        'status' => '0'
    );
    echo json_encode($userdetails);
}
$stmt->close();
$conn->close();
}
else
{
    echo"<script>location.replace('../Html/403.html')</script>";
}
?>