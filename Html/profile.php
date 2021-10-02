<?php
    session_start();
    include_once("http://localhost/guvi/Php/conn.php");
    $u_name = $_SESSION['u_name'];
    if($u_name)
    {
    $stmt = $conn->prepare("SELECT * FROM user_details WHERE username = (?)");
    $stmt->bind_param('s',$u_name);
    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    $user_id = $row['user_id'];
    $name = $row['u_name'];
    $u_email = $row['u_email'];
    $u_cno = $row['u_cno'];
    $u_dob = $row['u_dob'];
    $u_addr = $row['u_addr'];
    $runame = $row['username'];
    
    $stmt->close();
    $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mathesh">
    <title>GUVI Task By Mathesh</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/profile.css">
</head>
<body>
    <div class="container">
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <img src="assets/guvilogo.svg" alt="GUVI LOGO">
                        </div>
                        <h5 class="user-name">Developed By:</h5>
                        <h6 class="user-email">Mathesh</h6>
                    </div>
                    <div class="about">
                        <h5>About Guvi</h5>
                        <p>GUVI (Grab Your Vernacular Imprint) Geek Network Private Limited is an Online Learning Platform incubated by IITM and IIM-A, supported by Google Launchpad & Jio Gennext .

                            What sets us apart is the fact that we offer online learning in a plethora of different vernacular languages along with English. With more than 1.8 lakh users currently learning from our platform, GUVI continues to grow at a tremendous rate.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="mb-2 mx-auto">Your Profile Details</h2>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ID">User ID</label>
                            <input type="text" class="form-control" value="<?php echo $user_id; ?>" readonly> 
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Name</label>
                            <input type="text" class="form-control" value="<?php echo $name; ?>" readonly> 
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Uname">UserName</label>
                            <input type="email" class="form-control" value="<?php echo $u_name; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="<?php echo $u_email; ?>" readonly> 
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Contact No</label>
                            <input type="text" class="form-control" id="phone" pattern="[0-9]{10}" value="<?php echo $u_cno; ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="DOB">Date Of Birth</label>
                            <input type="url" class="form-control" value="<?php echo $u_dob; ?>" readonly>
                        </div>
                    </div>
        
                    <div class="col-12">
                        <div class="form-group">
                            <label for="Address">Your Address</label>
                            <textarea class="form-control" minlength="10" maxlength="200" id="addr">
                            <?php echo $u_addr; ?>
                            </textarea>
                        </div>
                    </div>
               
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block" id="update">Update</button>
                <br>
                <button type="submit" class="btn btn-secondary btn-lg btn-block" id="logout">Logout</button>

            </div>
        </div>
        </div>
        </div>
        </div>
        <script src="Js/jquery/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
        <script src="Js/profile.js" type="text/javascript"></script>
    
</body>
</html>
<?php
    }
    else
    {
        echo"<script>location.replace('403.html')</script>";
    }
?>