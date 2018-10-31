<?php
/*
$email = $_GET['email'];
$pass = $_GET['pass'];
echo $pass;
*/
	include 'connectMysql.php';

	$email = $_GET['email'];
	$pass = $_GET['pass'];

	session_start();
	$query = "SELECT pass,type_id FROM user_details  where email='$email'";
	   $run_sql = mysqli_query($conn,$query);
	if($run_sql->num_rows == 0) 
	{ 
    
		echo "not";
        
       
	}
	while($rows = mysqli_fetch_array($run_sql))
	                      {
                               $pss = $rows['pass'];
                                if(password_verify($pass, $pss) && $rows['type_id']==1)
                                {
                                    $_SESSION["username"] = $email;
                                    $_SESSION["type"] = 1;		
                                    
                                    //header("Location: homeReceiver.php");
                                    echo "correct-receiver";
                                    
                                }
                                else if(password_verify($pass, $pss) && $rows['type_id']==2)
                                {
                                    $_SESSION["username"] = $email;
                                    $_SESSION["type"] = 2;		
                                    echo "correct-hospital";
                                    //header("Location: homeHospital.php");
                                    
                                }
                                else
                                    echo "invalid";
					}	
	
	   
	

?>
