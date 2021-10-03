<?php
include_once('conn.php');

function get_data($conn)
{
    $stmt = $conn->prepare("SELECT * FROM user_details");

    $stmt->execute();

    $result = $stmt->get_result();

    $userdetails =  array();

    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
    $tmpdetails = array();

    $id = $row['user_id'];
    $name = $row['u_name'];
    $u_cno = $row['u_cno'];
    $u_email = $row['u_email'];
    $u_dob = $row['u_dob'];
    $u_addr = $row['u_addr'];
    $uname = $row['username'];
    $upass = $row['userpass'];

    $tmpdetails = array(
        'id' => $id,
        'name' => $name,
        'c_no' => $u_cno,
        'email' => $u_email,
        'dob' => $u_dob,
        'addr' =>$u_addr ,
        'username' => $uname,
        'pass' => $upass
        );
        array_push($userdetails,$tmpdetails);
    }
    return json_encode($userdetails);
}

$filename= date('d-M-Y').'.json';
if(file_put_contents($filename,get_data($conn)))
{
    echo $filename.'File has been created';
}
else
{
    echo "Ouch There seems to be some error. Please Inform the developer";
}
?>