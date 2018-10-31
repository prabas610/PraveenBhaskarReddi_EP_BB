<?php
    include 'connectMysql.php';
    session_start();
    include 'connectMysql.php';
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    if(isset($_SESSION["username"]) && $_SESSION["type"]==1)
    {
        $eee = $_SESSION["username"];
        $type = $_SESSION["type"];
        $query = "SELECT name FROM user_details where email='$eee'";
        $run_sql = mysqli_query($conn,$query); 
        $rows = mysqli_fetch_array($run_sql);
        $name = $rows['name'];
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
                    <li><a href="Receivers_home.php">Home</a></li>
                    <li><a href="#">Blood Tips</a></li>
                    <li><a href="availableBlood.php">Available Blood</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php 
                                echo $name;
                                echo " &nbsp; <span class='glyphicon glyphicon-user'></span>";
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
