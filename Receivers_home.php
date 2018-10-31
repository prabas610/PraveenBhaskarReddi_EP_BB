<html lang="en">

<head>
    <title>Home - Receiver | Blood Bank System</title>
    <?php include 'meta.php'?>
</head>

<body>

    <?php
                session_start();
                include 'connectMysql.php';
                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                if(isset($_SESSION["username"]) && $_SESSION["type"]==1)
                {
                    include 'Receivers_Header.php';
                    $eee = $_SESSION["username"];
                    $type = $_SESSION["type"];
         ?>
        <div class ="row" id= "receivers">
        <div class="col-sm1">
        </div>
        <div class="col-sm-5">


            <?php 
                $query = "SELECT * FROM receiver  where email='$eee'";
                $run_sql = mysqli_query($conn,$query);
                $rows = mysqli_fetch_array($run_sql);
                if($rows['gender'] == "male")
                    $sal = "Mr.";
                else if($rows['gender'] == "female")
                    $sal = "Ms./Mrs.";
                $time = strtotime($rows['dob']);
                $myFormatForView = date("d F, Y", $time);
                $_SESSION["b_group"] = $rows['blood_group'];	
                $create = strtotime($rows['time_stamp']);
                $stamp = date("r", $create);
             ?>
            <h3><b><?php echo $sal; echo " "; echo $name; ?> :</b> Following are your details</h3>
            <div style="width:100%; text-align:center; font-size:20px; height:400px; background-color:#f8f8f8; border-radius: 5px 50px; padding-top:30px; overflow-y: auto;">
                <table class="table" style="width:90%; margin-left:20px;">
                    <tr>
                        <td><span class="glyphicon glyphicon-calendar"></span> DOB </td>
                        <td>:
                            <?php echo $myFormatForView;?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-envelope"></span> Email Id </td>
                        <td>:
                            <?php echo $rows['email'];?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-tint"></span> Blood Group </td>
                        <td>:
                            <?php echo $rows['blood_group'];?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-gift"></span> Weight </td>
                        <td>:
                            <?php echo $rows['weight']; echo " Kg(s)";?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-phone-alt"></span> Phone </td>
                        <td>:
                            <?php echo $rows['phone']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-phone"></span> Mobile </td>
                        <td>:
                            <?php echo "+91 - "; echo $rows['mob']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-map-marker"></span> Address </td>
                        <td>:
                            <?php echo $rows['address']; echo ", "; echo $rows['city']; echo ", "; echo $rows['pin']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-time"></span> Created At </td>
                        <td>:
                            <?php echo $stamp; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-sm-5">
            <h3 style="text-align:right;">Blood Sample<br>Request</h3>
            <?php 
            
                    $query = "SELECT * FROM blood_request  where receiver='$eee' order by time_stamp desc";
                    $run_sql = mysqli_query($conn,$query);
                    if($run_sql->num_rows == 0) 
                    { 
                        ?>

            <div style="width:100%; text-align:center; font-size:20px; height:350; background-color:#f8f8f8; border-radius: 50px 5px; padding-top:155px;">
                No Blood Request<br>Check Available Blood Sample!
            </div>
            <?php
                    }
                    else
                        {
                        ?>
                <div style="width:100%; text-align:center; font-size:20px; height:400; background-color:#f8f8f8; border-radius: 50px 5px; padding-top:30px; padding-left:10px;padding-right:10px;overflow-y: auto;">
                    <table class="table table-hover">

                        <tr>
                            <th>Hospital</th>
                            <th>Blood Group / Units</th>
                            <th>Status</th>
                            <th>Request Date</th>
                        </tr>
                        <?php
                    
                    while($rows = mysqli_fetch_array($run_sql))
                    {
                        $h_e = $rows['hospital'];
                        $query1 = "SELECT hname FROM hospital  where email='$h_e'";
                        $run_sql1 = mysqli_query($conn,$query1);
                        $row1 = mysqli_fetch_array($run_sql1);
                        if($rows['status'] == "Pending")
                        {
                    ?>

                            <tr class="danger">
                                <td>
                                    <a href="hospital.php?hos=<?php echo $h_e?>&req=no_blood">
                                        <?php echo $row1['hname']?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $rows['blood_group']; echo" / "; echo $rows['units'];?> </td>
                                <td>
                                    <?php echo $rows['status'];?>
                                </td>
                                <td>
                                    <?php echo $rows['time_stamp'];?>
                                </td>
                            </tr>

                            <?php
                        }
                        else if($rows['status'] == "Approved")
                        {
                    ?>

                                <tr class="success">
                                    <td>
                                        <a href="hospital.php?hos=<?php echo $h_e?>&req=no_blood">
                                            <?php echo $row1['hname']?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $rows['blood_group']; echo" / "; echo $rows['units'];?> </td>
                                    <td>
                                        <?php echo $rows['status'];?>
                                    </td>
                                    <td>
                                        <?php echo $rows['time_stamp'];?>
                                    </td>
                                </tr>

                                <?php
                        }
                    }
                    }
                        ?>
                    </table>
                </div>
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-12" style="text-align:center; margin-top:20px; margin-bottom:20px;">
            <a href="availableBlood.php"><button type="button" class="btn btn-danger">Available Blood</button></a>
        </div>
                </div>
        <?php
                }
    else{
                    header("Location: loginAgain.php");

                }
    ?>
            <?php include 'footer.php';?>
</body>

</html>
