<html lang="en">

<head>
    <title>Confirm - Registration | Blood Bank System</title>
    <?php include 'meta.php'?>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container">
        <div class="col-sm-12" style="text-align:center;">
            <div class="row">
                <?php if (!empty($_GET['message'])) {
                echo '<p style="font-size:20px;"> '.$_GET['message'].'</p>';
				} ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>
