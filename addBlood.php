<html lang="en">

<head>
    <title>Add Blood | Blood Bank System</title>
    <?php include 'meta.php'?>

</head>

<body>

    <?php
                session_start();
                include 'connectMysql.php';
                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                if(isset($_SESSION["username"]) && $_SESSION["type"]==2)
                {
                    include 'Hospital_Header.php';
                    $eee = $_SESSION["username"];
                    $type = $_SESSION["type"];
                    
                    if($_POST['addBlood'] == "addBlood")
                    {
                            $a_plus = $_POST['a_plus'];
                            $b_plus = $_POST['b_plus'];
                            $o_plus = $_POST['o_plus'];
                            $a_neg = $_POST['a_neg'];
                            $b_neg = $_POST['b_neg'];
                            $o_neg = $_POST['o_neg'] ;
                            $ab_plus = $_POST['ab_plus'] ;
                            $ab_neg = $_POST['ab_neg'] ;
                        
                        $query2 = "SELECT * FROM blood_sample  where email='$eee'";
                        $run_sql2 = mysqli_query($conn,$query2);
                        if($run_sql2->num_rows == 0) 
                        {
                            
                          
                            $query1 = "INSERT INTO blood_sample VALUES('$eee', $a_plus, $b_plus, $o_plus, $a_neg, $b_neg, $o_neg, $ab_plus, $ab_neg)";
                            /*$query1 = "UPDATE blood_sample set a_plus=$a_plus, b_plus=$b_plus, o_plus=$o_plus, a_neg=$a_neg, b_neg=$b_neg, o_neg=$o_neg, ab_plus=$ab_plus, ab_neg=$ab_neg where email='$eee'";*/
                            if ($conn->query($query1) === TRUE) 
                            { 

                                header("Location: addBlood.php?message=<font color=gree>New Record Created!</font>");

                            }
                            else
                            {
                                 header("Location: addBlood.php?message=<font color=red>*Details Not Recorded<br>*$conn->error</font>");
                            }
                        }
                        else
                        {
                            
                            $query = "SELECT * FROM blood_sample  where email='$eee'";
                            $run_sql = mysqli_query($conn,$query);
                            $rows = mysqli_fetch_array($run_sql);
                            $a_plus = $a_plus + $rows['a_plus'];
                            $b_plus = $b_plus + $rows['b_plus'];
                            $o_plus = $o_plus + $rows['o_plus'];
                            $a_neg = $a_neg + $rows['a_neg'];
                            $b_neg = $b_neg + $rows['b_neg'];
                            $o_neg = $o_neg + $rows['o_neg'];
                            $ab_plus = $ab_plus + $rows['ab_plus'];
                            $ab_neg = $ab_neg + $rows['ab_neg'];
                        
                                $query1 = "UPDATE blood_sample set a_plus=$a_plus, b_plus=$b_plus, o_plus=$o_plus, a_neg=$a_neg, b_neg=$b_neg, o_neg=$o_neg, ab_plus=$ab_plus, ab_neg=$ab_neg where email='$eee'";
                                if ($conn->query($query1) === TRUE) 
                                { 

                                    header("Location: addBlood.php?message=<font color=gree>Details Updated!</font>");

                                }
                                else
                                {
                                     header("Location: addBlood.php?message=<font color=red>*Details Not Updated<br>*$conn->error</font>");
                                }
                        }
                    }
                        else
                        { 
                            ?>
        <div class="container" id ="addblood">
            <h3>Add Blood Sample</h3>
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6" style="text-align:center;">
                <?php if (!empty($_GET['message'])) {
				echo '<p> '.$_GET['message'].'</p>';
				} ?>
                <div style="width:100%; text-align:center; font-size:20px; height:440px; background-color:#f8f8f8; border-radius: 5px 50px; padding-top:20px;">
                    <form method="POST" action="addBlood.php">

                        <table style="width:90%; text-align:center;" class="table">
                            <tr>
                                <td>A +ve</td>
                                <td><input type="tel" placeholder = "No. of units available" class="form-control" name="a_plus"></td>
                            </tr>
                            <tr>
                                <td>B +ve</td>
                                <td><input type="tel" placeholder = "No. of units available" class="form-control" name="b_plus"></td>
                            </tr>
                            <tr>
                                <td>O +ve</td>
                                <td><input type="tel" placeholder = "No. of units available" class="form-control" name="o_plus"></td>
                            </tr>
                            <tr>
                                <td>A -ve</td>
                                <td><input type="tel" placeholder = "No. of units available" class="form-control" name="a_neg"></td>
                            </tr>
                            <tr>
                                <td>B -ve</td>
                                <td><input type="tel" placeholder = "No. of units available" class="form-control" name="b_neg"></td>
                            </tr>
                            <tr>
                                <td>O -ve</td>
                                <td><input type="tel" placeholder = "No. of units available" class="form-control" name="o_neg"></td>
                            </tr>
                            <tr>
                                <td>AB +ve</td>
                                <td><input type="tel" placeholder = "No. of units available" class="form-control" name="ab_plus"></td>
                            </tr>
                            <tr>
                                <td>AB -ve</td>
                                <td><input type="tel" placeholder = "No. of units available" class="form-control" name="ab_neg"></td>
                            </tr>
                        </table>
                        <a href="addBlood.php"><button type="submit" class="btn btn-danger" style="border-radius: 2px 10px;" name="addBlood" value="addBlood">Add Blood</button></a>
                    </form>

                </div>
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
