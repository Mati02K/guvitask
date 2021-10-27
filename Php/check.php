<?php

require './vendor/autoload.php';

$redis = new Predis\Client();

// echo $redis->ping();

echo $redis->set("name","Mathesh");
echo $redis->get("name");
echo $redis->set("name","MatheshT");
echo $redis->get("name");


// echo $redis->get("token");

// echo $redis->exists("uname");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="profile.php" method="post">
  <input type="text" name="token" id="">
<input type="submit" value="submit">
    </form>
</body>
</html>