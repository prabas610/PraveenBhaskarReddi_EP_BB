<html lang="en">

<head>
    <title>View Hospital | Blood Bank System</title>
    <?php include 'meta.php'?>
</head>

<body>


    <?php
                session_start();
                include 'connectMysql.php';
                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                if(isset($_SESSION["username"]) && $_SESSION["type"]==1)
                {
                    if($_POST['blood_req'] == "grant_req")
                    {
                        date_default_timezone_set('Asia/Calcutta');
                        $d = date("y-m-d H:i:s");
                        
                        $query = "SELECT max(sn) as snm FROM blood_request";
                        $run_sql = mysqli_query($conn,$query);
                        $rows = mysqli_fetch_array($run_sql);
                        $sn = $rows['snm'];
                        $sn = $sn + 1;
                        $eee = $_SESSION["username"];
                        $h_e = $_POST['hos_id'];
                        $b_group = $_SESSION['b_group'];
                        $query_in = "INSERT into blood_request values($sn, '$eee', '$h_e','$b_group',1,'Pending','$d')";
                        if ($conn->query($query_in) === TRUE) {
                            header("Location: availableBlood.php?message=<font color='green'>Blood Requested</font>");
                        }
                        else
                        {
                            header("Location: availableBlood.php?message=<font color='red'>Problem in Blood Request <br>$conn->error</font>");
                        }
                    }
                    else
                    {
                    
                    $hos = $_GET['hos'];
                    $req = $_GET['req'];
                    include 'Receivers_Header.php';
                    $eee = $_SESSION["username"];
                    $type = $_SESSION["type"];
                    $query = "SELECT * FROM hospital where email='$hos'";
                    $run_sql = mysqli_query($conn,$query);
                    $rows = mysqli_fetch_array($run_sql)
                    
    ?>
        <div class="container" id="hp">
            <h3><b>Hospital Details</b></h3>
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
                <center>
                    <h3><b>Hospital : </b>
                        <?php echo $rows['hname'];?>
                    </h3>
                </center><br>
                <table class="table table-bordered">
                    <tr>
                        <td><span class="glyphicon glyphicon-user"></span> Contact Person</td>
                        <td>
                            <?php echo $rows['cname']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-envelope"></span> Email ID</td>
                        <td>
                            <?php echo $rows['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-phone-alt"></span> Hospital Phone</td>
                        <td>
                            <?php echo $rows['phone']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-phone"></span> Emergency Contact (Mob.)</td>
                        <td>
                            <?php echo $rows['mob']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="glyphicon glyphicon-map-marker"></span> Address</td>
                        <td>
                            <?php echo $rows['address']; echo "<br>"; echo $rows['city']; echo ", "; echo $rows['pin']; ?></td>
                    </tr>

                </table>
                <?php if($req == "blood") {?>
                <form method="post" action="hospital.php">
                    <input type="hidden" name="hos_id" value="<?php echo $hos;?>">
                    <center><button type="submit" class="btn btn-danger" name="blood_req" value="grant_req">Request Blood : <?php echo $_SESSION["b_group"];?></button></center>
                </form>
                <?php }?>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <?php
                }
                }
                else{
                        header("Location: loginAgain.php");
                }
    ?>
            <?php include 'footer.php';?>
</body>

</html>
