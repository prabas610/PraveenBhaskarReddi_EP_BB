<html lang="en">

<head>
    <title>Blood Bank System</title>
    <?php include 'meta.php'?>
</head>

<body>
    <?php 
        session_start();
        if(isset($_SESSION["username"]) && $_SESSION["type"]==1)
        {
            include 'Receivers_Header.php';
        }
        else if(isset($_SESSION["username"]) && $_SESSION["type"]==2)
        {
            include 'Hospital_Header.php';
        }
        else
            include 'header.php';
    ?>
    <div class = "cotainer" id ="home">
        <div class = "row">
        <h1><u>Welcome to Blood Bank System</u></h1>
        <h2><u>Problem Statement:</u></h2>
        <p><ol>
            <li>Assume you are designing a real-life system, that will be used by real users.</li>
            <li>The application should contain 2 types of users: Hospitals and Receivers. </li>
            <li>Pages to be developed - </li>
            <ul>
                <li><b>‘Registration’ pages</b> - Different registration pages for hospitals &amp; receivers. Capture receiver’s blood group during registration.</li></ br>
                <li><b>‘Login’ pages</b> - Single/different login pages for hospitals &amp; receivers. <b>Hospital 
                    ‘Add blood info’ page</b> - A hospital, once logged in, should be able to add 
                    details of available blood samples (along with type) to their bank. 
                    Access to this page should be restricted only to hospitals.</li>
                <li><b>‘Available blood samples’ page</b> - There should be a page that displays all the available blood 
                    samples along with which hospital has them and a ‘Request Sample’ button. This page should be accessible to everyone,
                     irrespective of whether the user is logged in or not. Expected functionality on click of the ‘Request Sample’ button- </li></ br>
                     <ul>
                         <li>Only receivers should be able to request for blood samples by clicking the ‘Request Sample’ button. 
                             <b>Make sure that only those receivers who are eligible for the blood sample are allowed to click the button.</b></li></ br>
                        <li>If the user is not logged in, then he/she should be redirected to the login page.</li>
                        <li>If a user is logged in as a hospital, then the user should not be allowed to request for a blood sample.</li></ br>    
                     </ul>
            </ul> 
            <li> <b>Hospital ‘View requests’ page</b> - Hospitals should be able to see the 
                list of all the receivers who have requested for particular blood group from its blood bank.  </li>
    </ol>
    </p>
    <p>
        <h2><u>Solution:</u> </h2>
        <ol>
            <li> This application contains of 2 types of users: Hospitals and Receivers. </li>
            <li> <b>Registration Pages</b> - I have created seperated registration pages for both the users. The users registration page captures the users
            blood info at the time of user registration.</li>
            <li><b>Login Page</b> - I have created a single login page for both the users.</li>
            <li><b>'Add Blood info' page</b> - Access to this page is only restricted to hospitals. only, 
            hospital logged in can add their available blood details to this page.</li>
            <li><b>'Available Blood Sample' page</b> - This page is available to everyone and only the users logged in are able to request
            the blood from the list of the blood banks. If the user is not logged in he will be redirected to login page. And if a hospital user
            try's to access this page he will be redirected to login page.</li>
            <li><b>Blood Eligibility Criteria</b> - 
            <ul>
                <li>A user should be logged in to request blood.</li>
                <li><b>Note: </b>A user can only request his/her own blood group that is captured at the time of registration.</li>
                <li>Once a user sends a blood request to the respected blood bank the hospital must approve his request for him avail the blood 
                    he requested.
            </ul>
        </li>
        <li><b>'Hospital's View request' page</b> - Hospital can view the blood requests from the users in this page.A loggedin hospital 
            can only access this page. If a user tries to access this page he will be redirected to login page.</li>
        </ol>    
    </p>
    <p>
        <h2><u>Technologies:</u></h2>
        <ul>
            <li><b>Front-end :</b> HTML , CSS , JavaScript , Jquery , Bootstrap</li>
            <li><b>Back-end: </b> PHP, Mysql</li>
            <li><b>Software:</b> Xampp, Any browser</li>

        </ul>
    </p>
    <p>
        <h2><u>Setup and Installation:</u></h2>
        <ol>
            <li>Download the zip file named <b>PraveenBhaskarReddi_EP_BB</b> and unzip it.</li>
            <li>Copy the file into your xampp htdocs location. by default the location is <b>C://xampp/htdocs</b> </li>
            <li>Open the xampp controller and start Apache and Mysql.</li>
            <li>Open any browser any type <b>localhost/phpmyadmin</b> in the URL.</li>
            <li>Create a new database <b>blood_bank_system</b>.</li>
            <li>Select this database and click on import section. select this file : 
                <ul><li><b>C://xampp/htdocs/PraveenBhaskarReddi_EP_BB/sql/blood_bank_system.sql</b>, and hit OK. 
                    It will create all the relevant tables for this project.</li><ul></li>
            <li>Now everything is set. Open your browser and type this : <b>localhost/PraveenBhaskarReddi_EP_BB</b>.</li>
        </ol>
    </p>
    <p>
        <h3>Login Details: <u>Receivers</u></h3>
        <ul>
            <li><b>username: </b> FullName@gmail.com</li>
            <li><b>password: </b> FullName@123</li>
            <li>For example, The Full Name of the user is <b>Sam</b>, so the username (<b>sam@gmail.com</b>) and the password is (<b>sam@123</b>).</li>
        </ul>
        <h3>Login Details: <u>Hospitals</u></h3>
        <ul>
            <li><b>username: </b> HospitalName@gmail.com</li>
            <li><b>password: </b> HospitalName@123</li>
            <li>For example, The Full Name of the hospital is <b>Care Hospital</b>, so the username (<b>care@gmail.com</b>) and the password is (<b>care@123</b>).</li>
        </ul>
    </p></br></br>
    </div>
    </div>
    <?php include 'footer.php';?>

</body>

</html>
