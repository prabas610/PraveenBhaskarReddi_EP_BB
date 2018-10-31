<html lang="en">

<head>
    <title>Profile | Blood Bank System</title>
    <?php include 'meta.php'?>
    <script>
        $(document).ready(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#dob').attr('max', maxDate);
        });

    </script>
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
                    $query = "SELECT * FROM hospital where email='$eee'";
                    $run_sql = mysqli_query($conn,$query);
                    $rows = mysqli_fetch_array($run_sql);
                    ?>
        <div class="container" id = "hospital_profile">
            <div class="col-sm-9">
                <h2>Hospital Details</h2>
                <?php if (!empty($_GET['message'])) {
				echo '<p style="font-size:20px;"> '.$_GET['message'].'</p>';
				} ?>
                <form method="post" action="profile_Modify.php">
                    <div class="panel-group">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Login Information</div>
                            <div class="panel-body">


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="hname">Hospital Name*</label>
                                            <input type="text" class="form-control" name="hname" id="hname" value="<?php echo $rows['hname'];?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="cname">Contact Person*</label>
                                            <input type="text" class="form-control" name="cname" id="cname" value="<?php echo $rows['cname'];?>" required readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email ID*</label>
                                            <input type="email" class="form-control" name='email' id="email" value="<?php echo $rows['email'];?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br><br>



                        <div class="panel panel-primary">
                            <div class="panel-heading">Contact Information</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Hospital Phone*</label>
                                            <input type="number" class="form-control" name="phone" id="phone" value="<?php echo $rows['phone'];?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="mob">Emergency Contact (Mobile)*</label>
                                            <input type="number" class="form-control" name="mob" id="mob" value="<?php echo $rows['mob'];?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="city">City*</label>
                                            <input type="text" class="form-control" name="city" id="city" value="<?php echo $rows['city'];?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pin">Pincode (ZIP)*</label>
                                            <input type="text" class="form-control" name="pin" id="pin" value="<?php echo $rows['pin'];?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="add">Address*</label>
                                            <textarea class="form-control" rows="5" name="add" id="add" <?php echo $rows[ 'address'];?> readonly> <?php echo $rows['address'];?></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="type" id="type" value=2>
                    <div class="col-sm-6" style="text-align:center;"><input type="submit" class="btn btn-primary" id="mod" value="Update" disabled></div>
                    <div class="col-sm-6" style="text-align:center;">
                        <button type="button" class="btn btn-primary" id="check" onclick="readCheck()">Edit</button></div>
                    <script type="text/javascript">
                        function readCheck() {
                            if (document.getElementById('check').innerHTML == "Edit") {
                                document.getElementById('hname').readOnly = false;
                                document.getElementById('cname').readOnly = false;
                                document.getElementById('phone').readOnly = false;
                                document.getElementById('mob').readOnly = false;
                                document.getElementById('city').readOnly = false;
                                document.getElementById('pin').readOnly = false;
                                document.getElementById('add').readOnly = false;
                                document.getElementById('mod').disabled = false;
                                document.getElementById('check').innerHTML = "Done";
                            } else if (document.getElementById('check').innerHTML == "Done") {
                                document.getElementById('hname').readOnly = true;
                                document.getElementById('cname').readOnly = true;
                                document.getElementById('phone').readOnly = true;
                                document.getElementById('mob').readOnly = true;
                                document.getElementById('city').readOnly = true;
                                document.getElementById('pin').readOnly = true;
                                document.getElementById('add').readOnly = true;
                                document.getElementById('check').innerHTML = "Edit";
                            }
                        }

                    </script>
                </form>
            </div>
        </div>
        <?php
                }
                else if(isset($_SESSION["username"]) && $_SESSION["type"]==1)
                {
                    include 'Receivers_Header.php';
                    $eee = $_SESSION["username"];
                    $type = $_SESSION["type"];
                    $query = "SELECT * FROM receiver where email='$eee'";
                    $run_sql = mysqli_query($conn,$query);
                    $rows = mysqli_fetch_array($run_sql);
                    ?>
            <div class="container" id = "profile">
                <div class="col-sm-9">
                    <h2>Register as a Blood Receiver</h2>
                    <?php if (!empty($_GET['message'])) {
				echo '<p style="font-size:20px;"> '.$_GET['message'].'</p>';
				} ?>
                    <form method="post" action="profile_Modify.php">
                        <div class="panel-group">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Login Information</div>
                                <div class="panel-body">


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="fname">Full Name*</label>
                                                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $rows['name'];?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email ID*</label>
                                                <input type="email" class="form-control" name='email' id="email" value="<?php echo $rows['email'];?>" required readonly>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br><br><br>

                            <div class="panel panel-primary">
                                <div class="panel-heading">Receiver Information</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth*</label>
                                                <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $rows['dob'];?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="dob">Gender*</label>
                                                <div class="radio">
                                                    <?php if($rows['gender'] == "Male"){?>
                                                    <label><input type="radio" name="gender" value="Male" required checked>Male</label> &nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="gender" value="Female">Female</label>
                                                    <?php }
                                                else if($rows['gender'] == "Female"){?>
                                                    <label><input type="radio" name="gender" value="Male" required >Male</label> &nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="gender" value="Female" checked>Female</label>
                                                    <?php }
                                                else{?>
                                                    <label><input type="radio" name="gender" value="Male" required >Male</label> &nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="gender" value="Female" >Female</label>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Your Blood Group*</label>
                                                <select class="form-control" name="blood_group" id="blood_group" readonly>
                                    <option value="<?php echo $rows['blood_group'];?>"> <?php echo $rows['blood_group'];?> </option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                  </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pass">Weight (Kg.)*</label>
                                                <input type="number" class="form-control" name="weight" id="weight" value="<?php echo $rows['weight'];?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>


                            <div class="panel panel-primary">
                                <div class="panel-heading">Contact Information</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">Residence Phone</label>
                                                <input type="number" class="form-control" name="phone" id="phone" value="<?php echo $rows['phone'];?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="mob">Mobile*</label>
                                                <input type="number" class="form-control" name="mob" id="mob" value="<?php echo $rows['mob'];?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="city">City*</label>
                                                <input type="text" class="form-control" name="city" id="city" value="<?php echo $rows['city'];?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pin">Pincode (ZIP)*</label>
                                                <input type="text" class="form-control" name="pin" id="pin" value="<?php echo $rows['pin'];?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="add">Address*</label>
                                                <textarea class="form-control" rows="5" name="add" id="add" readonly><?php echo $rows['address'];?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <input type="hidden" name="type" id="type" value=1>
                        <div class="col-sm-6" style="text-align:center;"><input type="submit" class="btn btn-primary" id="mod" value="Update" disabled></div>
                        <div class="col-sm-6" style="text-align:center;"><button type="button" class="btn btn-primary" id="check" onclick="readCheckR()">Edit</button></div>
                        <script type="text/javascript">
                            function readCheckR() {
                                if (document.getElementById('check').innerHTML == "Edit") {
                                    document.getElementById('fname').readOnly = false;
                                    document.getElementById('dob').readOnly = false;
                                    document.getElementById('blood_group').readOnly = false;
                                    document.getElementById('weight').readOnly = false;
                                    document.getElementById('phone').readOnly = false;
                                    document.getElementById('mob').readOnly = false;
                                    document.getElementById('city').readOnly = false;
                                    document.getElementById('pin').readOnly = false;
                                    document.getElementById('add').readOnly = false;
                                    document.getElementById('mod').disabled = false;
                                    document.getElementById('check').innerHTML = "Done";

                                } else if (document.getElementById('check').innerHTML == "Done") {
                                    document.getElementById('fname').readOnly = true;
                                    document.getElementById('dob').readOnly = true;
                                    document.getElementById('blood_group').readOnly = true;
                                    document.getElementById('weight').readOnly = true;
                                    document.getElementById('phone').readOnly = true;
                                    document.getElementById('mob').readOnly = true;
                                    document.getElementById('city').readOnly = true;
                                    document.getElementById('pin').readOnly = true;
                                    document.getElementById('add').readOnly = true;
                                    document.getElementById('check').innerHTML = "Edit";
                                }
                            }

                        </script>
                    </form>
                </div>
            </div>
            <?php
                }
                else
                {
                    header("Location: loginAgain.php");
                }
    ?>
                <?php include 'footer.php'?>
</body>

</html>
