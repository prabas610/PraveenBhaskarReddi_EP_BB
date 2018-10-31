<?php 
    session_start();
    include 'connectMysql.php';
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    if(isset($_SESSION["username"]) && $_SESSION["type"]==1)
    {
        $type = $_POST['type'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood_group = $_POST['blood_group'];
        $weight = $_POST['weight'];
        $phone = $_POST['phone'];
        $mob = $_POST['mob'];
        $city = $_POST['city'];
        $pin = $_POST['pin'];
        $address = $_POST['add'];
        
        $query = "UPDATE receiver SET name = '$fname', dob = '$dob', gender = '$gender', blood_group = '$blood_group', weight = '$weight', phone = '$phone', mob = '$mob', city = '$city', pin = '$pin', address = '$address' where email = '$email'";
        if ($conn->query($query) === TRUE) {
                $query = "UPDATE user_details set name = '$fname' where email = '$email'";
			     if ($conn->query($query) === TRUE) {
                     			
                                header("Location: profile.php?message=<font color='green'> Modified<br>$conn->error</font>");
                 }
                
        }
        else
                {
                    header("Location: profile.php?message=<font color='red'> Problem in Modifying<br> $conn->error</font>");
                }
    }
    
    /* For Hospital */

    if(isset($_SESSION["username"]) && $_SESSION["type"]==2)
    {
        $eee = $_SESSION["username"];
        $type = $_SESSION["type"];
        $hname = $_POST['hname'];
        $cname = $_POST['cname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $mob = $_POST['mob'];
        $city = $_POST['city'];
        $pin = $_POST['pin'];
        $address = $_POST['add'];
        
        $query = "UPDATE hospital SET hname = '$hname', cname = '$cname', phone = '$phone', mob = '$mob', city = '$city', pin = '$pin', address = '$address' where email = '$email'";
        if ($conn->query($query) === TRUE) {
                $query = "UPDATE user_details SET name = '$hname' where email = '$email'";
			     if ($conn->query($query) === TRUE) {
			
                    header("Location: profile.php?message=<font color='geen'> Modified<br>$conn->error</font>");                    
                 }
                
        }
        else
                {
                    header("Location: profile.php?message=<font color='red'> Problem in Modifying<br> $conn->error</font>");
                }
    }

    

    
?>
