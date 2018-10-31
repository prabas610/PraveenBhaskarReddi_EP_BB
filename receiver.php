<html lang="en">

<head>
    <title>View Receiver | Blood Bank System</title>
    <?php include 'meta.php'?>
</head>

<body>


    <?php
                session_start();
                include 'connectMysql.php';
                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                if(isset($_SESSION["username"]) && $_SESSION["type"]==2)
                {
                    //$b_group = $_SESSION["rec_bgroup"];
                    if($_GET['final_approve'] == "grant_req")
                    {
                        
                        $h_e = $_SESSION["username"];
                        $b_group = $_GET['bgroup'];
                        $sno = $_GET['sno'];
                        $query = "UPDATE blood_sample SET ".$b_group." = ".$b_group." - 1 WHERE email='$h_e'";
                        if ($conn->query($query) === TRUE) 
                        {
                            $query1 = "UPDATE blood_request SET status = 'Approved' WHERE sn=$sno";
                            if ($conn->query($query1) === TRUE)
                            {
                                header("Location: viewRequest.php?message=<font color='green'>Blood Request Approved</font>");
                            }
                            else
                            {
                                $query2 = "UPDATE blood_sample SET ".$b_group." = ".$b_group." + 1 WHERE email='$h_e'";
                                if($conn->query($query2))
                                {
                                header("Location: viewRequest.php?message=<font color='red'>Problem in Providing Approval<br>$conn->error</font>");
                                }
                                
                            }
                        }
                        else
                        {
                            header("Location: viewRequest.php?message=<font color='red'>Problem in Accessing Blood Sample<br>$conn->error<br>$query</font>");
                        }
                    }
                    else
                    {
                    include 'Hospital_Header.php';
                    $r_e = $_GET['rec'];
                    $apr = $_GET['req_approval'];
                    
                    $query = "SELECT * FROM receiver where email='$r_e'";
                    $run_sql = mysqli_query($conn,$query);
                    $rows = mysqli_fetch_array($run_sql);
                    $time = strtotime($rows['dob']);
                    $dob = date("d F, Y", $time);
                    ?>
        <div class="container" id = "receivers_req">
            <h3>Receiver Details</h3>
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">

                <table class="table table-bordered">
                    <tr>
                        <td><span class="glyphicon glyphicon-user"></span> Receiver Name</td>
                        <td>
                            <?php echo $rows['name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-calendar"></span> Date of Birth</td>
                        <td>
                            <?php echo $dob; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-tint"></span> Blood Group</td>
                        <td>
                            <?php echo  $rows['blood_group']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-file"></span> Gender / Weight(kg)</td>
                        <td>
                            <?php echo $rows['gender']." / ".$rows['weight']; ?>
                        </td>
                    </tr>

                    <tr>
                        <td><span class="glyphicon glyphicon-envelope"></span> Email ID</td>
                        <td>
                            <?php echo $rows['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-phone"></span> Mobile</td>
                        <td>
                            <?php echo $rows['mob']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-phone-alt"></span> Phone</td>
                        <td>
                            <?php echo $rows['phone']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-map-marker"></span> Address</td>
                        <td>
                            <?php echo $rows['address'].",<br>".$rows['city'].", ".$rows['pin']; ?>
                        </td>
                    </tr>
                </table>
                <?php if($apr == "approve") {
                        $b_group = $rows['blood_group'];
                        if($b_group == "A+")
                            $bg = "a_plus";
                        else if($b_group == "B+")
                            $bg = "b_plus";
                        else if($b_group == "O+")
                            $bg = "o_plus";
                        else if($b_group == "A-")
                            $bg = "a_neg";
                        else if($b_group == "B-")
                            $bg = "b_neg";
                        else if($b_group == "O-")
                            $bg = "o_neg";
                        else if($b_group == "AB+")
                            $bg = "ab_plus";
                        else if($b_group == "AB-")
                            $bg = "ab_neg";
                ?>
                <form method="get" action="receiver.php">
                    <input type="hidden" name="rec_id" value="<?php echo $r_e;?>">
                    <input type="hidden" name="sno" value="<?php echo $_GET['sno'];?>">
                    <input type="hidden" name="bgroup" value="<?php echo  $bg; ?>">
                    <center><button type="submit" class="btn btn-danger" name="final_approve" value="grant_req">Approve Request</button></center>
                </form>
                <?php }?>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <?php
                }
                }
                
                else
                {
                    header("Location: loginAgain.php");
                }
    ?>
            <?php include 'footer.php'?>
</body>

</html>
