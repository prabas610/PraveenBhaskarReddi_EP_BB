<html lang="en">

<head>
    <title>Login Again | Blood Bank System</title>
    <?php include 'meta.php'?>

</head>

<body>
    <?php include 'header.php';?>
    <div class="container">
        <center>
            <h3>You are not logged in,<br>Login here!</h3>
        </center>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">

            <!-- <form id="form" role="form">-->
            <div class="form-group">
                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                <input type="text" class="form-control" id="email-1" name="email-1" placeholder="Enter email" onkeyup="checkVal()">
            </div>
            <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                <input type="password" class="form-control" id="pass-1" name="pass-1" placeholder="Enter password">
            </div>
            <p id="err-1" style="color:red;"></p>
            <div id="messages"></div>
            <button class="btn btn-success btn-block" id="logIn-1"><span class="glyphicon glyphicon-off"></span> Login</button>

            <!-- </form> -->

            <script>
                $(document).ready(function() {

                    $("#logIn-1").click(function() {
                        var p = $("#email-1").val();
                        var q = $("#pass-1").val();
                        $.ajax({
                            type: "GET",
                            data: "email=" + p + "&pass=" + q,
                            dataType: "html",
                            url: "validate.php",
                            success: function(result) {


                                if (result == "correct-receiver") {
                                    $("#err-1").html("<font color='green'><span class='glyphicon glyphicon-ok'></span> Validated! Logging In</font>");
                                    window.location = "Receivers_home.php";
                                } else if (result == "correct-hospital") {
                                    $("#err-1").html("<font color='green'><span class='glyphicon glyphicon-ok'></span> Validated! Logging In</font>");
                                    window.location = "Hospital_home.php";
                                } else if (result == "invalid")
                                    $("#err-1").html("<font color='red'><span class='glyphicon glyphicon-ok'></span> Invalid ID-Pass.</font>");
                                else if (result == "not")
                                    $("#err-1").html("<font color='red'><span class='glyphicon glyphicon-ok'></span> Not Registred Yet!</font>");

                            }
                        });
                    });
                });

            </script>

        </div>
        <div class="col-sm-4">
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>
