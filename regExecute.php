<?php 
    include 'connectMysql.php'; 
    date_default_timezone_set('Asia/Calcutta');

    /* For Receiver */

    if($_POST['type'] == 1)
    {
        $type = $_POST['type'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood_group = $_POST['blood_group'];
        $weight = $_POST['weight'];
        $phone = $_POST['phone'];
        $mob = $_POST['mob'];
        $city = $_POST['city'];
        $pin = $_POST['pin'];
        $address = $_POST['add'];
        $d = date("y-m-d H:i:s");
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO user_details values('$email', '$fname', '$hash', '$type')";
        if ($conn->query($query) === TRUE) {
                $query = "INSERT INTO receiver values('$fname', '$email', '$dob', '$gener', '$blood_group', $weight, $phone, $mob, '$address', '$city', $pin, '$d')";
			     if ($conn->query($query) === TRUE) {
                     
                    header("Location: regConfirm.php?message=<font color=gree>New Account Created Successfully!</font>");
                 }
                
        }
        else
                {
                    header("Location: regReceiver.php?message=<font color='red'> *Problem in Registering<br>*Try again with Valid Details<br> *$conn->error</font>");
                }
    }
    
    /* For Hospital */

    if($_POST['type'] == 2)
    {
        $type = $_POST['type'];
        $hname = $_POST['hname'];
        $cname = $_POST['cname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $mob = $_POST['mob'];
        $city = $_POST['city'];
        $pin = $_POST['pin'];
        $address = $_POST['add'];
        
        
        $d = date("y-m-d H:i:s");
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO user_details values('$email', '$hname', '$hash', '$type')";
        if ($conn->query($query) === TRUE) {
                $query = "INSERT INTO hospital values('$hname', '$cname', '$email',  '$phone', '$mob', '$city', '$pin', '$address', '$d')";
			     if ($conn->query($query) === TRUE) {
                     
	
                                header("Location: regConfirm.php?message=<font color='green'>Congratulations <b>$cname</b>, Your Hospital <b>$hname</b> is Registered Now</font><br><font color='green'><b>LOGIN</b> to Avail Facilites of <b>Blood Bank</b><br>$conn->error</font>");
                 }
                
        }
        else
                {
                    header("Location: regHospital.php?message=<font color='red'> *Problem in Registering<br>*Try again with Valid Details<br> *$conn->error</font>");
                }
    }

    

    
?>
