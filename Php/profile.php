<?php
include_once('conn.php');
if(isset($_POST['token']))
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
    echo"<script>location.replace('403.html')</script>";
}
?>