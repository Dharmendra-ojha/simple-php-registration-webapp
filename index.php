<?php
$insert = false;
if(isset($_POST['name'])){
    $server = 'localhost';#Your Hostname
    $password = 'password';#Your password
    $user = 'user';#Your username
    $db = 'trip';#Your database
 
    //Connecting to the MySQL server
    $mysqli = mysqli_connect($server,$user,$password,$db);
    if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
    }
    
    //Insertion of Data in the MySQL Database
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip` (`name`,`gender`,`email`,`phone`,`other`,`dt`) VALUES ('$name','$gender','$email','$phone', '$desc',current_timestamp());";
    if ($mysqli->query($sql) == true) {
        //Flag
        $insert = true;
    }
    else {
        echo("ERROR $sql <br> $mysqli->error ");
    }
    //Disconnecting to the MySQL server
    $mysqli->close();
}
?>
<!--HTML Code-->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>PHP Project</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
  </head>
  <body>
  <center>
    <div class="container">
      <h1>Registration Form</h1>
      <h3>For Nothing😂😂</h3>
      <?php
      if($insert == true){
          echo '<h3 class="submitmsg">Thanks for Submitting</h3>';
          
      }
      ?>
      <form action="index.php" method="POST" accept-charset="utf-8">
        <input type="text" name="name" id="name" placeholder="Enter your name" /><br/>
        <input type="text" name="gender" id="gender" placeholder="Enter your Gender" /><br />
        <input type="email" name="email" id="email" placeholder="Enter your Email" /><br />
        <input type="phone" name="phone" id="phone" placeholder="Enter your Phone no." /><br />
        <textarea type="text" name="desc" id="desc" placeholder="Others" cols="22" rows="10"></textarea><br />
        <button type="submit">Submit</button>
      </form>
    </div>
  </center>
  </body>
</html>