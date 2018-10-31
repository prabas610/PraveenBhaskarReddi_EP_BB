<?php
    include 'connectMysql.php';
    session_start();
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    if(isset($_SESSION["username"]) && $_SESSION["type"]==2)
    {
        $eee = $_SESSION["username"];
        $type = $_SESSION["type"];
        $query = "SELECT name FROM user_details where email='$eee'";
        $run_sql = mysqli_query($conn,$query); 
        $rows = mysqli_fetch_array($run_sql);
        $name = $rows['name'];
        
        $query1 = "SELECT count(sn) as req_count FROM blood_request where hospital='$eee' and status = 'Pending'";
        $run_sql1 = mysqli_query($conn,$query1); 
        $row1 = mysqli_fetch_array($run_sql1);
        $req_count = $row1['req_count'];
        
    }
?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                  </button>
                <a class="navbar-brand" href="index.php">
                    <a class="navbar-brand" href="#"><h2>Blood Bank System</h2></a>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Hospital_home.php">Home</a></li>
                    <li><a href="#">Blood Tips</a></li>
                    <li><a href="addBlood.php">Add Blood Sample</a></li>
                    <li><a href="viewRequest.php">Blood Requests <span class="badge"><?php echo $req_count;?></span></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php
                                echo $name;
                                echo "&nbsp; <span class='glyphicon glyphicon-home'></span> ";
                                 ?>
                        <span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php">Your Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
