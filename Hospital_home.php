<html lang="en">

<head>
    <title>Home - Hospital | Blood Bank System</title>
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
                    $eee = $_SESSION["username"];
                    $blood_max = 100;
         ?>

        <div class="container-fluid" id ="hospital_home">

            <h3><b><?php echo $name; ?></b> : Current Blood Samples</h3>
                <div class="col-sm-12">
                    <?php 
            
                    $query = "SELECT * FROM blood_sample  where email='$eee'";
                    $run_sql = mysqli_query($conn,$query);
                    if($run_sql->num_rows == 0) 
                    { 
                        ?>
                    <div style="width:100%; text-align:center; font-size:20px; height:200px; background-color:#ffe5e5; border-radius: 5px 50px; padding-top:80px;">No Blood Sample Available<br><br><a href="addBlood.php"><button type="button" class="btn btn-danger">Add Blood Samples</button></a></div>

                    <?php
                    }
                    else
                    {
                    $rows = mysqli_fetch_array($run_sql);
            
            ?>
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-4">
                    <?php 
                    {
                        $a_plus = $rows['a_plus'];
                        $a_bb = ($a_plus * 100)/($blood_max);
                    ?>
                    <label for="a_plus"><h4>A +ve : <?php echo $a_plus; ?> /Units</h4></label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a_bb; ?>%">
                        </div>
                    </div>
                    <?php }?>

                    <?php 
                    {
                        $b_plus = $rows['b_plus'];
                        $a_bb = ($b_plus * 100)/($blood_max);
                    ?>
                    <label for="b_plus"><h4>B +ve : <?php echo $b_plus; ?> /Units</h4></label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a_bb; ?>%">
                        </div>
                    </div>
                    <?php }?>

                    <?php 
                    {
                        $o_plus = $rows['o_plus'];
                        $a_bb = ($o_plus * 100)/($blood_max);
                    ?>
                    <label for="o_plus"><h4>O +ve : <?php echo $o_plus; ?> /Units</h4></label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a_bb; ?>%">
                        </div>
                    </div>
                    <?php }?>

                    <?php 
                    {
                        $ab_plus = $rows['ab_plus'];
                        $a_bb = ($ab_plus * 100)/($blood_max);
                    ?>
                    <label for="ab_plus"><h4>AB +ve : <?php echo $ab_plus; ?> /Units</h4></label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a_bb; ?>%">
                        </div>
                    </div>
                    <?php }?>



                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                    <?php 
                    {
                        $a_neg = $rows['a_neg'];
                        $a_bb = ($a_neg * 100)/($blood_max);
                    ?>
                    <label for="a_neg"><h4>A -ve : <?php echo $a_neg; ?> /Units</h4></label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a_bb; ?>%">
                        </div>
                    </div>
                    <?php }?>

                    <?php 
                    {
                        $b_neg = $rows['b_neg'];
                        $a_bb = ($b_neg * 100)/($blood_max);
                    ?>
                    <label for="b_neg"><h4>B -ve : <?php echo $b_neg; ?> /Units</h4></label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a_bb; ?>%">
                        </div>
                    </div>
                    <?php }?>

                    <?php 
                    {
                        $o_neg = $rows['o_neg'];
                        $a_bb = ($o_neg * 100)/($blood_max);
                    ?>
                    <label for="o_neg"><h4>O -ve : <?php echo $o_neg; ?> /Units</h4></label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a_bb; ?>%">
                        </div>
                    </div>
                    <?php }?>

                    <?php 
                    {
                        $ab_neg = $rows['ab_neg'];
                        $a_bb = ($ab_neg * 100)/($blood_max);
                    ?>
                    <label for="ab_neg"><h4>AB -ve : <?php echo $ab_neg; ?> /Units</h4></label>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $a_bb; ?>%">
                        </div>
                    </div>
                    <?php }?>
                </div>

                <div class="col-sm-1">
                </div>
                <br><br>
                <br><br>

                <div class="row" id= "btns">
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-2" style="text-align:center;">
                    <a href="addBlood.php"><button type="button" class="btn btn-primary">Add Blood Samples</button></a>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2" style="text-align:center;">
                    <a href="viewRequest.php"><button type="button" class="btn btn-primary">View Requests</button></a>
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
            </div>
            </div>
            <?php include 'footer.php';?>
</body>

</html>
